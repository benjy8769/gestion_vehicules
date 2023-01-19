<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

session_start();
if(!isset($_SESSION["id"])){
    header("Location: login");
    exit(); 
 }
class PersonnelController extends AbstractController
{
    

    #[Route('/personnel', name: 'app_personnel')]
    public function index(): Response
    {
        $session = new Session();

        $role = $session->get('role');

        if($role == "administration"){
            return $this->render('choix/index.html.twig', [
                'controller_name' => 'ChoixController',
            ]);
        }elseif($role == "intervenant"){
            return $this->render('choix/index.html.twig', [
                'controller_name' => 'ChoixController',
            ]);
        }elseif($role == "administratif"){
            return $this->render('choix/index.html.twig', [
                'controller_name' => 'ChoixController',
            ]);
        }else{
            return $this->render('choix/index.html.twig', [
                'controller_name' => 'ChoixController',
            ]);
        }

    }
} 
