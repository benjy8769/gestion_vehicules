<?php

namespace App\Controller;

use App\Entity\Utilisateurs;
use App\Entity\Utilisation;
use App\Repository\UtilisateursRepository;
use App\Repository\VoitureRepository;
use Doctrine\ORM\Query\AST\Functions\DateDiffFunction;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class PriseVehiculeController extends AbstractController
{
    /**
     * @Route("/prise/vehicule", name="app_prise_vehicule")
     */

    public function PriseVehicule(VoitureRepository $repo, UtilisateursRepository $repoUser, ManagerRegistry $doctrine): Response
    {

        $request = Request::createFromGlobals();
        $session = new Session();
        $utilisation = new Utilisation();
        $entityManager = $doctrine->getManager();

        $userId = $session->get('identifiant');
        $nom = $session->get('nom');
        $prenom = $session->get('prenom');
        $role = $session->get('role');

        $identifiant = $request->get('vehicule');
        $dateDebut = $request->get('dateDebut');

        $formatDateDebut = date("d-m-Y H:i", strtotime($dateDebut));
        
        $observations = $identifiant;

        $vehicule = $repo->findVehicule($identifiant);

        $user = $repoUser->findUser($userId);

        


        // Recupération des données de la table Voiture
        $identifiantVehicule = $vehicule->getIdentifiant();
        $siteVehicule = $vehicule->getSite();
        $garantieVehicule = $vehicule->getGarantie();
        $GeocoyoteVehicule = $vehicule->isGeocoyote();
        $observations = $vehicule->getObservations();
        $kilometrage = $vehicule->getKilometrage();
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
        $vehicule->setObservations($observations);
        $vehicule->setKilometrage(intval($kilometrage));
        $idVoiture = $vehicule->getIdentifiant($vehicule);
        $estDisponible = $vehicule->isEstDisponible();
        $estDisponible = 0;
        $vehicule->setEstDisponible(intval($estDisponible));

        $utilisation->setDateDebut(strval($formatDateDebut));
        $utilisation->setDateFin((strval($formatDateDebut)));
        $utilisation->setNom(strval($nom));
        $utilisation->setPrenom(strval($prenom));
        $utilisation->setVoitureId(strval($idVoiture));
        $utilisation->setUtilisateurId(strval($userId));

        $userNom = $user->getNom();
        $userPrenom = $user->getPrenom();
        $userMail = $user->getMail();
        $userPass = $user->getPassword();
        
        $user->setIdentifiant(strval($userId));
        $user->setNom(strval($userNom));
        $user->setPrenom(strval($userPrenom));
        $user->setMail(strval($userMail));
        $user->setPassword($userPass);
        $user->setRoles(strval($role));
        $user->setVehicule(strval($identifiantVehicule));

        $entityManager->persist($vehicule);
        $entityManager->persist($utilisation);
        $entityManager->persist($user);
        $entityManager->flush();

        return $this->render('logout/index.html.twig', [
            'controller_name' => 'LogoutController',
        ]);

    }
}
