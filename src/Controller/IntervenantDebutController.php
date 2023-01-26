<?php

namespace App\Controller;
use App\Entity\Utilisation;
use App\Repository\VoitureRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;



class IntervenantController extends AbstractController
{
    #[Route('login/intervenant/debut', name: 'debut_intervenant')]
    public function debut(VoitureRepository $repo, ManagerRegistry $doctrine): Response
    {
        $listeVehicules = $repo->findAll();
        $request = Request::createFromGlobals();
        $session = new Session();
        $utilisation = new Utilisation();
        $entityManager = $doctrine->getManager();

        $nom = $session->get('nom');
        $prenom = $session->get('prenom');

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

        $utilisation->setDateDebut(strval($dateDebut));
        $utilisation->setDateFin((strval($dateDebut)));
        $utilisation->setNom(strval($nom));
        $utilisation->setPrenom(strval($prenom));
        $utilisation->setVoitureId(strval($idVoiture));

        $entityManager->persist($vehicule);
        $entityManager->persist($utilisation);
        $entityManager->flush();



        return $this->render('intervenant/intervenant_debut.twig', [
            'controller_name' => 'IntervenantDebutController',
            'lesVehicules' => $listeVehicules,
            'nom' => $nom,
            'prenom' => $prenom,
            'voiture_id' => $idVoiture,
            'date_debut' => $dateDebut,
        ]);

    }
}
