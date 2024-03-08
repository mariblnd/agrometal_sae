<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class AgrometalController extends AbstractController
{
    public function homepageController(){
        return $this->render('homepage.html.twig');
    }

    public function referencesController(){
        return $this->render('references.html.twig');

    }

    public function equipementsController(){
        return $this->render('equipements.html.twig');
    }

    public function adminpanelController(){
        return $this->render('adminpanel.html.twig');
    }


}

?>
