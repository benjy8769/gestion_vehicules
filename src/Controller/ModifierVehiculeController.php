<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ModifierVehiculeController extends AbstractController
{
    #[Route('/modifier_vehicule', name: 'app_modifier_vehicule')]
    public function index(): Response
    {
        return $this->render('modifier_vehicule/index.html.twig', [
            'controller_name' => 'ModifierVehiculeController',
        ]);
    }
}
