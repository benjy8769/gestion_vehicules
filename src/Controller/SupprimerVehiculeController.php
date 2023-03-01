<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SupprimerVehiculeController extends AbstractController
{
    #[Route('/supprimer/vehicule', name: 'app_supprimer_vehicule')]
    public function index(): Response
    {
        return $this->render('supprimer_vehicule/index.html.twig', [
            'controller_name' => 'SupprimerVehiculeController',
        ]);
    }
}
