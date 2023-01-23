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

        $hash = password_hash($mdp, PASSWORD_BCRYPT);

        $entityManager = $doctrine->getManager();

        $user = new Utilisateurs();


        $user->setNom(strval($nom));
        $user->setPrenom(strval($prenom));
        $user->setIdentifiant(strval($identifiant));
        $user->setMail(strval($mail));
        $user->setPassword($hash);
        $user->setRoles(strval($role));

        $entityManager->persist($user);
        $entityManager->flush();

        if(password_verify($mdp, $hash)){
            
            return $this->render('inscription/index.html.twig', [
                'controller_name' => 'InscriptionController',
                'nom'=> $nom, 'prenom'=>$prenom, 'identifiant'=>$identifiant, 'mail'=>$mail, 'pwd'=>$mdp, 'choixRole'=>$role,
            ]);
        }

    }


}
