<?php

namespace App\Controller;

use App\Entity\Voiture;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class CreerVehiculesController extends AbstractController
{
    #[Route('/creer/vehicules', name: 'app_creer_vehicules')]
    public function index(): Response
    {
        return $this->render('creer_vehicules/index.html.twig', [
            'controller_name' => 'CreerVehiculesController',
        ]);
    }
}
