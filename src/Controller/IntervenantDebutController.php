<?php

namespace App\Controller;

use App\Repository\VoitureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class IntervenantDebutController extends AbstractController
{
    /**
     * @Route("/Intervenant/Prise_vehicule", name="debut_intervenant")
     */
    public function debut(VoitureRepository $repo): Response
    {
        $listeVehicules = $repo->findAll();
    
        return $this->render('intervenant_debut/intervenant_debut.twig', [
            'controller_name' => 'IntervenantDebutController',
            'lesVehicules' => $listeVehicules,
        ]);

    }
}
