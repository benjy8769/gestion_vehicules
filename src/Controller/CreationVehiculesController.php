<?php

namespace App\Controller;

use App\Entity\Voiture;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class CreationVehiculesController extends AbstractController
{
    /**
     * @Route("/creation_vehicules", name="app_creation_vehicules")
     */

    public function creerVehicules(ManagerRegistry $doctrine): Response
    {
        
        $request = Request::createFromGlobals();

    
        $identifiant=$request->get('identifiant');
        $marque=$request->get('marque');
        $modele=$request->get('modele');
        $immatriculation=$request->get('immatriculation');
        $kilometrage=$request->get('kilometrage');
        $choixSite=$request->get('choixSite');
        $choixCarburant=$request->get('choixCarburant');
        $garantie=$request->get('garantie');
        $disponiblestr=$request->get('disponible');
        $geocoyotestr=$request->get('geocoyote');
        $num_geocoyote=$request->get('num_geocoyote');
        $observations=$request->get('observations');
        
        if($disponiblestr == "oui"){
            $disponible = 1;
        }elseif ($disponiblestr == 1) {
            $disponible = 1;
        }
        else{
            $disponible = 0;
        }

        if($geocoyotestr == "oui"){
            $geocoyote = 1;
        }elseif ($geocoyotestr == 1) {
            $geocoyote = 1;
        }
        else{
            $geocoyote = 0;
        }

        $entityManager = $doctrine->getManager();

        
        $voiture = new Voiture();

        $voiture->setIdentifiant(strval($identifiant));
        $voiture->setMarque($marque);
        $voiture->setModele($modele);
        $voiture->setImmatriculation($immatriculation);
        $voiture->setKilometrage($kilometrage);
        $voiture->setSite(strval($choixSite));
        $voiture->setCarburant($choixCarburant);
        $voiture->setGarantie(strval($garantie));
        $voiture->setEstDisponible($disponible);
        $voiture->setGeocoyote($geocoyote);
        $voiture->setNumGeocoyote(intval($num_geocoyote));
        $voiture->setObservations($observations);
        

        $entityManager->persist($voiture);
        $entityManager->flush();

        return $this->render('creer_vehicules/index.html.twig', [
            'controller_name' => 'CreerVehiculesController',
        ]);
    }
}
