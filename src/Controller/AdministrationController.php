<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AdministrationController extends AbstractController
{
    /**
     * @Route("/menu_administration", name="menu_admin")
     */
    
     public function index(): Response
    {
        

        return $this->render('administration/index.html.twig', [
            'controller_name' => 'AdministrationController',
        ]);
    }
}
