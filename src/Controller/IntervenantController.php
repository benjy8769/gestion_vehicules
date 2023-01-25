<?php

namespace App\Controller;
use App\Entity\Voiture;
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
        $voiture = new Voiture();
        $utilisation = new Utilisation();
        $entityManager = $doctrine->getManager();

        $nom = $session->get('nom');
        $prenom = $session->get('prenom');

        $vehicule = $request->get('vehicule');
        $dateDebut = $request->get('dateDebut');
        $kilometrage = $request->get('kilometrage');

        $voiture->setKilometrage(intval($kilometrage));
        $estDisponible = $voiture->isEstDisponible();
        $estDisponible = 0;
        $voiture->setEstDisponible(intval($estDisponible));

        $utilisation->setIdVehicule(strval($vehicule));
        $utilisation->setDateDebut(strval($dateDebut));
        $utilisation->setNom(strval($nom));
        $utilisation->setPrenom(strval($prenom));

        $entityManager->persist($voiture, $utilisation);
        $entityManager->flush();

        return $this->render('intervenant/intervenant_debut.twig', [
            'controller_name' => 'IntervenantController',
            'lesVehicules' => $listeVehicules,
            'nom' => $nom,
            'prenom' => $prenom,
            'id_vehicule' => $vehicule,
            'date_debut' => $dateDebut,
            'kilometrage' => $kilometrage,
            'est_disponible' => $estDisponible,
        ]);
    }


    #[Route('/login/intervenant/fin', name: 'fin_intervenant')]
    public function fin(VoitureRepository $repo): Response
    {
        

        return $this->render('intervenant/intervenant_fin.twig', [
            'controller_name' => 'IntervenantController',
        ]);
    }
}
