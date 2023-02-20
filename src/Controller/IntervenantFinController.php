<?php

namespace App\Controller;

use App\Entity\Utilisation;
use App\Repository\VoitureRepository;
use App\Repository\UtilisationRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;



class IntervenantFinController extends AbstractController
{
    #[Route('login/intervenant/fin', name: 'fin_intervenant')]
    public function fin(VoitureRepository $repo): Response
    {
            $listeVehicules = $repo->findAll();
            return $this->render('intervenant_fin/index.html.twig', [
            'controller_name' => 'IntervenantFinController',
            'lesVehicules' => $listeVehicules,
        ]);
    }
}
