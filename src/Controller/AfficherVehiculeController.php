<?php

namespace App\Controller;

use App\Repository\VoitureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class AfficherVehiculeController extends AbstractController
{
    #[Route('/afficher_vehicule', name: 'app_afficher_vehicule')]
    public function index(VoitureRepository $repo): Response
    {
        $request = Request::createFromGlobals();
        $getIdentifiant = $request->get('choixVehicule');

        $vehicule = $repo->findVehicule($getIdentifiant);

        $session = new Session();
        $session->set('vehicule', $vehicule);

        return $this->render('afficher_vehicule/index.html.twig', [
            'controller_name' => 'AfficherVehiculeController',
            'vehicule' => $vehicule
        ]);
    }
}
