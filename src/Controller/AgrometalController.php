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


//FORM Things
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;



class AgrometalController extends AbstractController
{
    /*******************************************   HOMEPAGE    ***********************************************/

    public function homepageController(EntityManagerInterface $entityManager, Request $request)
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

    $socialmedia_bdd = $entityManager->getRepository(MediaSocial::class)->findAll();

    $entreprise_bdd = $entityManager->getRepository(Entreprise::class)->findAll();
    $point_map_bdd = $entityManager->getRepository(PointCarte::class)->findAll();

    $equipments_bdd = $entityManager->getRepository(Equipments::class)->findAll();
    $equipements_min1_bdd = $entityManager->getRepository(EquipmentsMinusOne::class)->findAll(); 
    $equipements_min2_bdd = $entityManager->getRepository(EquipmentsMinusTwo::class)->findAll();

    $news_bdd = $entityManager->getRepository(News::class)->findAll();
    $news_number_bdd = $entityManager->getRepository(NewsNumber::class)->findAll(); 

    $regions_bdd = $entityManager->getRepository(MapRegions::class)->findAll();

    return $this->render('homepage.html.twig', [

        'contactsFile' => $contactsFile,
        'equipementsFile' => $equipementsFile,
        'mapFile' => $mapFile,
        'newsFile' => $newsFile,
        'referencesFile' => $referencesFile,

        'contact_bdd' => $contact_bdd,
        'entreprise_bdd' => $entreprise_bdd,
        'socialmedia_bdd' => $socialmedia_bdd,
        'equipments_bdd' => $equipments_bdd,
        'equipements_min1_bdd' => $equipements_min1_bdd,
        'equipements_min2_bdd' => $equipements_min2_bdd,
        'news_bdd' => $news_bdd,
        'news_number_bdd' => $news_number_bdd,
        'regions_bdd' => $regions_bdd,
        'point_map_bdd' => $point_map_bdd,
    ]);
}


    /*******************************************  REFERENCES  ***********************************************/

    public function referencesController(EntityManagerInterface $entityManager, Request $request, MailerInterface $mailer){
    
    $contact = new Contact();
    $form = $this->createForm(ContactType::class, $contact);
    $form->handleRequest($request);

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
            ->to('i.e 58910a6e7f-cdd005+1@inbox.mailtrap.io')
            ->subject($nom)
            ->htmlTemplate('email/contact.html.twig')
            ->context([
                'contact'=>$contact
            ]);

        $mailer->send($email);

    }

        $repository = $entityManager->getRepository(AgromeetalJSON::class);

        $contacts = $repository->findOneBy(['json_file_name'=>'agrometal_contacts']);
        $map = $repository->findOneBy(['json_file_name'=>'map_regions']);
        $references = $repository->findOneBy(['json_file_name'=>'references']);

        $contactsFile = $contacts ? $contacts->getJsonFile() : null;
        $mapFile = $map ? $map->getJsonFile() : null;
        $referencesFile = $references ? $references->getJsonFile() : null;

        $contact_bdd = $entityManager->getRepository(ContactAgrometal::class)->findAll(); 

        $socialmedia_bdd = $entityManager->getRepository(MediaSocial::class)->findAll();

        $entreprise_bdd = $entityManager->getRepository(Entreprise::class)->findAll();
        $point_map_bdd = $entityManager->getRepository(PointCarte::class)->findAll();

        return $this->render('references.html.twig',[
            'contactsFile' => $contactsFile,
            'mapFile' => $mapFile,
            'referencesFile' => $referencesFile,
            'form' => $form->createView(),

            'contact_bdd' => $contact_bdd,
            'socialmedia_bdd' => $socialmedia_bdd,
            'entreprise_bdd' => $entreprise_bdd,
            'point_map_bdd' => $point_map_bdd,
        ]);
    }

     /*******************************************  EQUIPEMENTS  ***********************************************/

     public function equipementsController(EntityManagerInterface $entityManager)
     {
         $repository = $entityManager->getRepository(AgromeetalJSON::class);
     
         $contacts = $repository->findOneBy(['json_file_name' => 'agrometal_contacts']);
         $equipements = $repository->findOneBy(['json_file_name' => 'equipments']);
     
         $contactsFile = $contacts ? $contacts->getJsonFile() : null;
         $equipementsFile = $equipements ? $equipements->getJsonFile() : null;

        $equipments_bdd = $entityManager->getRepository(Equipments::class)->findAll();
        $equipements_min1_bdd = $entityManager->getRepository(EquipmentsMinusOne::class)->findAll(); 
        $equipements_min2_bdd = $entityManager->getRepository(EquipmentsMinusTwo::class)->findAll();

        $contact_bdd = $entityManager->getRepository(ContactAgrometal::class)->findAll(); 
        $socialmedia_bdd = $entityManager->getRepository(MediaSocial::class)->findAll();
     
         return $this->render('equipements.html.twig', [
             'contactsFile' => $contactsFile,
             'equipementsFile' => $equipementsFile,
             'equipments_bdd' => $equipments_bdd,
            'equipments_min1_bdd' => $equipments_min1_bdd,
            'equipments_min2_bdd' => $equipments_min2_bdd,
            'contact_bdd' => $contact_bdd,
            'socialmedia_bdd' => $socialmedia_bdd,
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

        $socialmedia_bdd = $entityManager->getRepository(MediaSocial::class)->findAll();

        $entreprise_bdd = $entityManager->getRepository(Entreprise::class)->findAll();
        $point_map_bdd = $entityManager->getRepository(PointCarte::class)->findAll();

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
            'socialmedia_bdd' => $socialmedia_bdd,
            'equipments_bdd' => $equipments_bdd,
            'equipements_min1_bdd' => $equipements_min1_bdd,
            'equipements_min2_bdd' => $equipements_min2_bdd,
            'news_bdd' => $news_bdd,
            'news_number_bdd' => $news_number_bdd,
            'regions_bdd' => $regions_bdd,
            'point_map_bdd' => $point_map_bdd,
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

    $socialmedia_bdd = $entityManager->getRepository(MediaSocial::class)->findAll();

    $entreprise_bdd = $entityManager->getRepository(Entreprise::class)->findAll();
    $point_map_bdd = $entityManager->getRepository(PointCarte::class)->findAll();

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
        'socialmedia_bdd' => $socialmedia_bdd,
        'equipments_bdd' => $equipments_bdd,
        'equipements_min1_bdd' => $equipements_min1_bdd,
        'equipements_min2_bdd' => $equipements_min2_bdd,
        'news_bdd' => $news_bdd,
        'news_number_bdd' => $news_number_bdd,
        'regions_bdd' => $regions_bdd,
        'point_map_bdd' => $point_map_bdd,
    ]);
}


}

?>
