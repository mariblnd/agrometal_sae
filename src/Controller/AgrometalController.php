<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Doctrine\ORM\EntityManagerInterface;

//ENTITY
use App\Entity\Contact;
use App\Entity\News;
use App\Entity\NewsNumber;
use App\Form\ContactType;
use App\Entity\AgromeetalJSON;
use App\Entity\ContactAgrometal;
use App\Entity\Entreprise;
use App\Entity\Equipments;
use App\Entity\EquipmentsMinusOne;
use App\Entity\EquipmentsMinusTwo;
use App\Entity\MapRegions;
use App\Entity\MediaSocial;
use App\Entity\PointCarte;
use App\Entity\WorkContact;


//FORM Things
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


// JSON

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class AgrometalController extends AbstractController
{
    /*******************************************   HOMEPAGE    ***********************************************/

    public function homepageController(EntityManagerInterface $entityManager, Request $request, MailerInterface $mailer)
    {
        $encoders = [new XmlEncoder(), new JsonEncoder()];     //
        $normalizers = [new ObjectNormalizer()];               //  Transfer to JSON
        $serializer = new Serializer($normalizers, $encoders); //

        $repository = $entityManager->getRepository(AgromeetalJSON::class);

        $map = $repository->findOneBy(['json_file_name' => 'map_regions']);
        $mapFile = $map ? $map->getJsonFile() : null;


        $contact_bdd = $entityManager->getRepository(ContactAgrometal::class)->findAll();
        $work_contact_bdd = $entityManager->getRepository(WorkContact::class)->findAll();

        $entreprise_bdd = $entityManager->getRepository(Entreprise::class)->findAll();
        $json_entreprise_bdd = $serializer->serialize($entreprise_bdd, 'json');

        $equipments_bdd = $entityManager->getRepository(Equipments::class)->findAll();

        $news_bdd = $entityManager->getRepository(News::class)->findAll();
        $news_number_bdd = $entityManager->getRepository(NewsNumber::class)->findAll();

        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        //SEND MAIL

        if ($form->isSubmitted() && $form->isValid()) {

            $nom = $form->get('nom')->getData();
            $message = $form->get('message')->getData();
            $mail = $form->get('mail')->getData();
            $tel = $form->get('tel')->getData();
            $brasserieExist = $form->get('brasserie_exist')->getData();
            $brasserieName = $form->get('brasserie_name')->getData();
            $project = $form->get('project')->getData();

            $contact->setNom($nom);
            $contact->setMessage($message);
            $contact->setMail($mail);
            $contact->setTel($tel);
            $contact->setBrasserieExist($brasserieExist);
            $contact->setBrasserieName($brasserieName);
            $contact->setProject($project);

            $entityManager->persist($contact);
            $entityManager->flush();

            $email = (new TemplatedEmail())
                ->from($mail)
                ->to('test@test.fr')
                ->subject($nom)
                ->htmlTemplate('email/contact.html.twig')
                ->context([
                    'contact' => $contact
                ]);

            $mailer->send($email);

        }

        return $this->render('homepage.html.twig', [
            'mapFile' => $mapFile,
            'form' => $form->createView(),

            'contact_bdd' => $contact_bdd,
            'entreprise_bdd' => $json_entreprise_bdd,
            'equipments_bdd' => $equipments_bdd,
            'news_bdd' => $news_bdd,
            'news_number_bdd' => $news_number_bdd,
            'work_contact_bdd' => $work_contact_bdd,
        ]);
    }


    /*******************************************  REFERENCES  ***********************************************/

    public function referencesController(EntityManagerInterface $entityManager, Request $request, MailerInterface $mailer)
    {

        $repository = $entityManager->getRepository(AgromeetalJSON::class);

        $contacts = $repository->findOneBy(['json_file_name' => 'agrometal_contacts']);
        $map = $repository->findOneBy(['json_file_name' => 'map_regions']);
        $references = $repository->findOneBy(['json_file_name' => 'references']);

        $contactsFile = $contacts ? $contacts->getJsonFile() : null;
        $mapFile = $map ? $map->getJsonFile() : null;
        $referencesFile = $references ? $references->getJsonFile() : null;

        $contact_bdd = $entityManager->getRepository(ContactAgrometal::class)->findAll();
        $work_contact_bdd = $entityManager->getRepository(WorkContact::class)->findAll();

        $entreprise_bdd = $entityManager->getRepository(Entreprise::class)->findAll();

        /*$point_map_bdd = $entityManager->getRepository(PointCarte::class)->findAll();
        $json_point_map_bdd = $serializer->serialize($point_map_bdd, 'json');*/

        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        //SEND MAIL

        if ($form->isSubmitted() && $form->isValid()) {

            $nom = $form->get('nom')->getData();
            $message = $form->get('message')->getData();
            $mail = $form->get('mail')->getData();
            $tel = $form->get('tel')->getData();
            $brasserieExist = $form->get('brasserie_exist')->getData();
            $brasserieName = $form->get('brasserie_name')->getData();
            $project = $form->get('project')->getData();

            $contact->setNom($nom);
            $contact->setMessage($message);
            $contact->setMail($mail);
            $contact->setTel($tel);
            $contact->setBrasserieExist($brasserieExist);
            $contact->setBrasserieName($brasserieName);
            $contact->setProject($project);

            $entityManager->persist($contact);
            $entityManager->flush();

            $email = (new TemplatedEmail())
                ->from($mail)
                ->to('test@test.fr')
                ->subject($nom)
                ->htmlTemplate('email/contact.html.twig')
                ->context([
                    'contact' => $contact
                ]);

            $mailer->send($email);}

        return $this->render('references.html.twig', [
            'contactsFile' => $contactsFile,
            'mapFile' => $mapFile,
            'referencesFile' => $referencesFile,
            'form' => $form->createView(),

            'contact_bdd' => $contact_bdd,
            'entreprise_bdd' => $entreprise_bdd,
            //'point_map_bdd' => $point_map_bdd,
            'work_contact_bdd' => $work_contact_bdd,
        ]);
    }

    /*******************************************  EQUIPEMENTS  ***********************************************/

    public function equipementsController(EntityManagerInterface $entityManager)
    {
        $encoders = [new XmlEncoder(), new JsonEncoder()];     //
        $normalizers = [new ObjectNormalizer()];               //  Transfer to JSON
        $serializer = new Serializer($normalizers, $encoders); //

        $repository = $entityManager->getRepository(AgromeetalJSON::class);



        $contacts = $repository->findOneBy(['json_file_name' => 'agrometal_contacts']);
        $work_contact_bdd = $entityManager->getRepository(WorkContact::class)->findAll();

        $contactsFile = $contacts ? $contacts->getJsonFile() : null;

        $equipments_bdd = $entityManager->getRepository(Equipments::class)->findAll();
        $json_equipments_bdd = $serializer->serialize($equipments_bdd, 'json');
        $equipements_min1_bdd = $entityManager->getRepository(EquipmentsMinusOne::class)->findAll();
        $json_equipements_min1_bdd = $serializer->serialize($equipements_min1_bdd, 'json');
        $equipements_min2_bdd = $entityManager->getRepository(EquipmentsMinusTwo::class)->findAll();
        $json_equipements_min2_bdd = $serializer->serialize($equipements_min2_bdd, 'json');

        $contact_bdd = $entityManager->getRepository(ContactAgrometal::class)->findAll();

        return $this->render('equipments.html.twig', [
            'contactsFile' => $contactsFile,
            'json_equipments_bdd' => $json_equipments_bdd,
            'equipments_bdd' => $equipments_bdd,
            'equipments_min1_bdd' => $json_equipements_min1_bdd,
            'equipments_min2_bdd' => $json_equipements_min2_bdd,
            'contact_bdd' => $contact_bdd,
            'work_contact_bdd' => $work_contact_bdd,
        ]);
    }



    /*******************************************  ADMINPANEL  ***********************************************/

    public function adminpanelController(EntityManagerInterface $entityManager, Request $request)
    {
        $repository = $entityManager->getRepository(AgromeetalJSON::class);

        $contacts = $repository->findOneBy(['json_file_name' => 'agrometal_contacts']);
        $equipements = $repository->findOneBy(['json_file_name' => 'equipments']);
        $map = $repository->findOneBy(['json_file_name' => 'map_regions']);
        $news = $repository->findOneBy(['json_file_name' => 'news']);
        $references = $repository->findOneBy(['json_file_name' => 'references']);

        $contactsFile = $contacts ? $contacts->getJsonFile() : null;
        $equipementsFile = $equipements ? $equipements->getJsonFile() : null;
        $mapFile = $map ? $map->getJsonFile() : null;
        $newsFile = $news ? $news->getJsonFile() : null;
        $referencesFile = $references ? $references->getJsonFile() : null;

        $contact_bdd = $entityManager->getRepository(ContactAgrometal::class)->findAll();
        $work_contact_bdd = $entityManager->getRepository(WorkContact::class)->findAll();

        $entreprise_bdd = $entityManager->getRepository(Entreprise::class)->findAll();

        $equipments_bdd = $entityManager->getRepository(Equipments::class)->findAll();
        $equipements_min1_bdd = $entityManager->getRepository(EquipmentsMinusOne::class)->findAll();
        $equipements_min2_bdd = $entityManager->getRepository(EquipmentsMinusTwo::class)->findAll();

        $news_bdd = $entityManager->getRepository(News::class)->findAll();
        $news_number_bdd = $entityManager->getRepository(NewsNumber::class)->findAll();

        $regions_bdd = $entityManager->getRepository(MapRegions::class)->findAll();


        return $this->render('adminpanel.html.twig', [
            'contactsFile' => $contactsFile,
            'equipementsFile' => $equipementsFile,
            'mapFile' => $mapFile,
            'newsFile' => $newsFile,
            'referencesFile' => $referencesFile,

            'contact_bdd' => $contact_bdd,
            'entreprise_bdd' => $entreprise_bdd,
            'equipments_bdd' => $equipments_bdd,
            'equipements_min1_bdd' => $equipements_min1_bdd,
            'equipements_min2_bdd' => $equipements_min2_bdd,
            'news_bdd' => $news_bdd,
            'news_number_bdd' => $news_number_bdd,
            'regions_bdd' => $regions_bdd,
            'work_contact_bdd' => $work_contact_bdd,
        ]);
    }

    /*************************************** CONTACTS **************************************************/

    public function contactsController(EntityManagerInterface $entityManager)
    {
        $repository = $entityManager->getRepository(AgromeetalJSON::class);

        $contacts = $repository->findOneBy(['json_file_name' => 'agrometal_contacts']);
        $equipements = $repository->findOneBy(['json_file_name' => 'equipments']);
        $map = $repository->findOneBy(['json_file_name' => 'map_regions']);
        $news = $repository->findOneBy(['json_file_name' => 'news']);
        $references = $repository->findOneBy(['json_file_name' => 'references']);

        $contactsFile = $contacts ? $contacts->getJsonFile() : null;
        $equipementsFile = $equipements ? $equipements->getJsonFile() : null;
        $mapFile = $map ? $map->getJsonFile() : null;
        $newsFile = $news ? $news->getJsonFile() : null;
        $referencesFile = $references ? $references->getJsonFile() : null;

        $contact_bdd = $entityManager->getRepository(ContactAgrometal::class)->findAll();
        $work_contact_bdd = $entityManager->getRepository(WorkContact::class)->findAll();

        $entreprise_bdd = $entityManager->getRepository(Entreprise::class)->findAll();

        $equipments_bdd = $entityManager->getRepository(Equipments::class)->findAll();
        $equipements_min1_bdd = $entityManager->getRepository(EquipmentsMinusOne::class)->findAll();
        $equipements_min2_bdd = $entityManager->getRepository(EquipmentsMinusTwo::class)->findAll();

        $news_bdd = $entityManager->getRepository(News::class)->findAll();
        $news_number_bdd = $entityManager->getRepository(NewsNumber::class)->findAll();

        $regions_bdd = $entityManager->getRepository(MapRegions::class)->findAll();



        return $this->render('contacts.html.twig', [
            'contactsFile' => $contactsFile,
            'equipementsFile' => $equipementsFile,
            'mapFile' => $mapFile,
            'newsFile' => $newsFile,
            'referencesFile' => $referencesFile,

            'contact_bdd' => $contact_bdd,
            'entreprise_bdd' => $entreprise_bdd,
            'equipments_bdd' => $equipments_bdd,
            'equipements_min1_bdd' => $equipements_min1_bdd,
            'equipements_min2_bdd' => $equipements_min2_bdd,
            'news_bdd' => $news_bdd,
            'news_number_bdd' => $news_number_bdd,
            'regions_bdd' => $regions_bdd,
            'work_contact_bdd' => $work_contact_bdd,
        ]);
    }


}

?>