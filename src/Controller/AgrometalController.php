<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\AgromeetalJSON;
use App\Entity\Contact;
use App\Form\ContactType;


class AgrometalController extends AbstractController
{
    /*******************************************   HOMEPAGE    ***********************************************/

    public function homepageController(EntityManagerInterface $entityManager, Request $request)
{


    //FORMULAIRE DE CONTACT

       /* $this->addFlash('success', 'Message envoyé');

        $emailContent = "Message de : $name\n";
        $emailContent .= "Adresse e-mail : $email\n\n";
        $emailContent .= "Message :\n$message";

        $email = (new Email())
                ->from('marieblanchard7@laposte.net') 
                ->to('marieblanchard7@laposte.net') 
                ->subject('Nouveau message de contact')
                ->text($emailContent);
            
        $mailer->send($email);*/

    
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

    return $this->render('homepage.html.twig', [

        'contactsFile' => $contactsFile,
        'equipementsFile' => $equipementsFile,
        'mapFile' => $mapFile,
        'newsFile' => $newsFile,
        'referencesFile' => $referencesFile,
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
            ->to('marieblanchard7@laposte.net')
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

        return $this->render('references.html.twig',[
            'contactsFile' => $contactsFile,
            'mapFile' => $mapFile,
            'referencesFile' => $referencesFile,
            'form' => $form->createView(),
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
     
         return $this->render('equipements.html.twig', [
             'contactsFile' => $contactsFile,
             'equipementsFile' => $equipementsFile
         ]);
     }
     


     /*******************************************  ADMINPANEL  ***********************************************/

     public function adminpanelController(EntityManagerInterface $entityManager)
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
     
         return $this->render('adminpanel.html.twig', [
             'contactsFile' => $contactsFile,
             'equipementsFile' => $equipementsFile,
             'mapFile' => $mapFile,
             'newsFile' => $newsFile,
             'referencesFile' => $referencesFile
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

    return $this->render('contacts.html.twig', [
        'contactsFile' => $contactsFile,
        'equipementsFile' => $equipementsFile,
        'mapFile' => $mapFile,
        'newsFile' => $newsFile,
        'referencesFile' => $referencesFile
    ]);
}


}

?>
