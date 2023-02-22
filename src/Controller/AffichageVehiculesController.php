<?php

namespace App\Controller;

use App\Repository\VoitureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AffichageVehiculesController extends AbstractController
{
    /**
     * @Route("/affichage_vehicules", name="app_affichage_vehicules")
     */
    public function afficher_vehicules(VoitureRepository $repo): Response
    {
        $listeVehicules = $repo->findAll();

        return $this->render('affichage_vehicules/index.html.twig', [
            'controller_name' => 'AffichageVehiculesController',
            'vehicules' => $listeVehicules
        ]);
    }
}
