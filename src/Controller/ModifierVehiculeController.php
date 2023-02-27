<?php

namespace App\Controller;

use App\Repository\VoitureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ModifierVehiculeController extends AbstractController
{
    #[Route('/modifier_vehicule', name: 'app_modifier_vehicule')]
    public function index(VoitureRepository $repo): Response
    {
        $request = Request::createFromGlobals();
        $getIdentifiant = $request->get('choixVehicule');

        $vehicule = $repo->findVehicule($getIdentifiant);



        return $this->render('modifier_vehicule/index.html.twig', [
            'controller_name' => 'ModifierVehiculeController',
            'vehicule' => $vehicule
        ]);
    }
}
