<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\AgromeetalJSON;

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

    return $this->render('homepage.html.twig', [
        'contactsFile' => $contactsFile,
        'equipementsFile' => $equipementsFile,
        'mapFile' => $mapFile,
        'newsFile' => $newsFile,
        'referencesFile' => $referencesFile
    ]);
}


    /*******************************************  REFERENCES  ***********************************************/

    public function referencesController(){

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
            'referencesFile' => $referencesFile
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
