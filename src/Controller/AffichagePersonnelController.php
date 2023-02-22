<?php

namespace App\Controller;

use App\Repository\UtilisateursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AffichagePersonnelController extends AbstractController
{
    #[Route('/affichage_personnel', name: 'app_affichage_personnel')]
    public function index(UtilisateursRepository $repo): Response
    {
        $personnel = $repo->findAll();
        
        return $this->render('affichage_personnel/index.html.twig', [
            'controller_name' => 'AffichagePersonnelController',
            'personnel' => $personnel
        ]);
    }
}
