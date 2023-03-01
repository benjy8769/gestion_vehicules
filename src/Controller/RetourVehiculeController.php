<?php

namespace App\Controller;

use App\Entity\Utilisation;
use App\Repository\UtilisateursRepository;
use App\Repository\VoitureRepository;
use App\Repository\UtilisationRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;



class RetourVehiculeController extends AbstractController
{
    #[Route('/retour/vehicule', name: 'app_retour_vehicule')]
    public function retourVehicule(UtilisationRepository $repo, VoitureRepository $repoVehicules, UtilisateursRepository $repoUser, ManagerRegistry $doctrine): Response
    {
        if (!isset($_SESSION))
        {
            return $this->render('login/index.html.twig', [
                'controller_name' => 'LoginController',
            ]);
        }

        $request = Request::createFromGlobals();
        $session = new Session();
        $entityManager = $doctrine->getManager();

        $userId = $session->get('identifiant');
        $role = $session->get('role');

        $user =$repoUser->findUser($userId);

        $identifiant = $request->get('vehicule');
        $dateFin = $request->get('dateFin');
        $kilometrage = $request->get('kilometrage');

        $formatDateFin = date("d-m-Y H:i", strtotime($dateFin));


        $vehicule = $repoVehicules->findVehicule($identifiant);

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

        $utilisation = $repo->findUtilisation($idVoiture, $userId);
        $dateDebut = $utilisation->getDateDebut();
        $dateFinUtilisation = $utilisation->getDateFin();
        $nomUtilisateur = $utilisation->getNom();
        $prenomUtilisateur = $utilisation->getPrenom();
        $voitureid = $utilisation->getVoitureId();
        $userId = $utilisation->getUtilisateurId();

        $userNom = $user->getNom();
        $userPrenom = $user->getPrenom();
        $userMail = $user->getMail();
        $userPass = $user->getPassword();

        if($dateDebut==$dateFinUtilisation){
            $utilisation->setNom(strval($nomUtilisateur));
            $utilisation->setPrenom(strval($prenomUtilisateur));
            $utilisation->setDateDebut(strval($dateDebut));
            $utilisation->setDateFin("");
            $utilisation->setDateFin(strval($formatDateFin));
            $utilisation->setVoitureId(strval($voitureid));
            $utilisation->setUtilisateurId(strval($userId));

            $user->setIdentifiant(strval($userId));
            $user->setNom(strval($userNom));
            $user->setPrenom(strval($userPrenom));
            $user->setMail(strval($userMail));
            $user->setPassword($userPass);
            $user->setRoles(strval($role));
            $user->setVehicule("");
        }

        $entityManager->persist($vehicule);
        $entityManager->persist($utilisation);
        $entityManager->flush();


        return $this->render('choixIntervenant/index.html.twig', [
            'controller_name' => 'ChoixIntervenant',
            'voiture_id' => $idVoiture,
            'utilisateur_id' => $userId
        ]);
    }
}
