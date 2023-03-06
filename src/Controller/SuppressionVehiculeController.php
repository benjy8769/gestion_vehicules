<?php

namespace App\Controller;

use App\Repository\VoitureRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class SuppressionVehiculeController extends AbstractController
{
    #[Route('/suppression/vehicule', name: 'app_suppression_vehicule')]
    public function index(VoitureRepository $repo, ManagerRegistry $doctrine): Response
    {
        $request = Request::createFromGlobals();

        $entityManager = $doctrine->getManager();

        if ($request->isMethod('POST')) {
            $action = $request->request->get('action');

            $lesVehicules = $repo->findAll();
            if ($action == 'supprimer') {

                $session = new Session();
                $vehicule = $session->get('vehicule');

                $entityManager->remove($vehicule);
                $entityManager->flush();

                return $this->render('affichage_vehicules/index.html.twig', [
                    'controller_name' => 'AffichageVehiculesController',
                    'vehicules' =>$lesVehicules
                ]);
            } else{
                return $this->render('affichage_vehicule/index.html.twig', [
                    'controller_name' => 'AffichageVehiculeController',
                    'vehicules' =>$lesVehicules
                ]);
            }        
        }

        return $this->render('suppression_vehicule/index.html.twig', [
            'controller_name' => 'SuppressionVehiculeController',
        ]);
    }
}
