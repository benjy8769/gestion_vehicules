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


class RetourVehiculeController extends AbstractController
{
    #[Route('/retour/vehicule', name: 'app_retour_vehicule')]
    public function retourVehicule(VoitureRepository $repo, UtilisationRepository $repoUtilisation, ManagerRegistry $doctrine): Response
    {
        $listeVehicules = $repo->findAll();
        $request = Request::createFromGlobals();
        $utilisation = new Utilisation();
        $entityManager = $doctrine->getManager();
        $Getutilisation = $repoUtilisation->findAll();


        $identifiant = $request->get('vehicule');
        $dateDebut = $request->get('dateDebut');
        $kilometrage = $request->get('kilometrage');

        $vehicule = $repo->findVehicule($identifiant);

        // Recupération des données de la table Voiture
        $identifiantVehicule = $vehicule->getIdentifiant();
        $siteVehicule = $vehicule->getSite();
        $garantieVehicule = $vehicule->getGarantie();
        $GeocoyoteVehicule = $vehicule->isGeocoyote();
        if($GeocoyoteVehicule == 0)
        {
            $GeocoyoteVehicule = false;
        }else
        {
            $GeocoyoteVehicule = true;
        }

        if($garantieVehicule == 0)
        {
            $garantieVehicule = false;
        }else
        {
            $garantieVehicule = true;
        }

        $vehicule->setIdentifiant(strval($identifiantVehicule));
        $vehicule->setSite(strval($siteVehicule));
        $vehicule->setGarantie($garantieVehicule);
        $vehicule->setGeocoyote($GeocoyoteVehicule);

        $vehicule->setKilometrage(intval($kilometrage));
        $idVoiture = $vehicule->getIdentifiant($vehicule);
        $estDisponible = $vehicule->isEstDisponible();
        $estDisponible = 1;
        $vehicule->setEstDisponible(intval($estDisponible));
        $utilisation->setDateFin((strval($dateDebut)));


        $entityManager->persist($vehicule);
        $entityManager->persist($utilisation);
        $entityManager->flush();



        return $this->render('login/index.html.twig', [
            'controller_name' => 'IntervenantLogin',
            'lesVehicules' => $listeVehicules,
            'voiture_id' => $idVoiture,
            'date_debut' => $dateDebut,
        ]);
    }
}
