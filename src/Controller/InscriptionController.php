<?php

namespace App\Controller;

use App\Entity\Utilisateurs;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class InscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'app_inscription')]



    public function creer_utilisateur(ManagerRegistry $doctrine): Response
    {
        $request = Request::createFromGlobals();
        $nom=$request->get('nom');
        $prenom=$request->get('prenom');
        $identifiant=$request->get('identifiant');
        $mail=$request->get('mail');
        $mdp=$request->get('pwd');
        $role=$request->get('choixRole');

        


        $entityManager = $doctrine->getManager();

        $user = new Utilisateurs();

        // $idUtilisateur = $user->getId();

        // $user->setIdUtilisateur($idUtilisateur);
        $user->setNom(strval($nom));
        $user->setPrenom(strval($prenom));
        $user->setIdentifiant(strval($identifiant));
        $user->setMail(strval($mail));
        $user->setMotDePasse(strval($mdp));
        $user->setRole(strval($role));

        $entityManager->persist($user);
        $entityManager->flush();

        return $this->render('inscription/index.html.twig', [
            'controller_name' => 'InscriptionController',
        ]);
    }


    public function index($nom, $prenom, $identifiant, $mail, $mdp, $role): Response
    {
        return $this->render('inscription/index.html.twig', [
            'controller_name' => 'InscriptionController',
            'nom'=> $nom, 'prenom'=>$prenom, 'identifiant'=>$identifiant, 'mail'=>$mail, 'pwd'=>$mdp, 'choixRole'=>$role
        ]);
    }


}
