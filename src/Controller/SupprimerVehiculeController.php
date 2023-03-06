<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SupprimerVehiculeController extends AbstractController
{
    
    #[Route('/supprimer/vehicule', name: 'app_supprimer_vehicule')]

    public function index()
    {
        return $this->render('supprimer_vehicule/index.html.twig', [
            'controller_name' => 'SupprimerVehiculeController',
        ]);
    }
}
