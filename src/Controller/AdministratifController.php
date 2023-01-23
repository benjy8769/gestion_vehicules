<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdministratifController extends AbstractController
{
    #[Route('/administratif', name: 'app_administratif')]
    public function index(): Response
    {
        return $this->render('administratif/index.html.twig', [
            'controller_name' => 'AdministratifController',
        ]);
    }
}
