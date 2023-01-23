<?php

namespace App\Controller;

use App\Repository\VoitureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IntervenantController extends AbstractController
{
    #[Route('/intervenant', name: 'app_intervenant')]
    public function Intervenant(VoitureRepository $repo): Response
    {
        $repo;

        return $this->render('intervenant/index.html.twig', [
            'controller_name' => 'IntervenantController',
        ]);
    }
}
