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
use Symfony\Component\HttpFoundation\Session\Session;


class IntervenantFinController extends AbstractController
{
    #[Route('/login/intervenant/fin', name: 'fin_intervenant')]
    public function fin(VoitureRepository $repo, UtilisationRepository $repoUtilisation, ManagerRegistry $doctrine): Response
    {
        $listeVehicules = $repo->findAll();
        $request = Request::createFromGlobals();
        $utilisation = new Utilisation();
        $entityManager = $doctrine->getManager();


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
        $estDisponible = 0;
        $vehicule->setEstDisponible(intval($estDisponible));

        $dateDeFin = $repoUtilisation->getDateFin();
        $utilisation->setDateFin((strval($dateDebut)));


        $entityManager->persist($vehicule);
        $entityManager->persist($utilisation);
        $entityManager->flush();



        return $this->render('intervenant_fin/index.html.twig', [
            'controller_name' => 'IntervenantFinController',
            'lesVehicules' => $listeVehicules,
            'voiture_id' => $idVoiture,
            'date_debut' => $dateDebut,
        ]);
    }
}
