<?php

namespace App\Controller;

use App\Entity\Utilisateurs;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'app_inscription')]

    public function creer_utilisateur(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $user = new Utilisateurs();
        $user->setNom('Chevalier');
        $user->setPrenom('Benjamin');
        $user->setIdentifiant('benjamin.chevalier');
        $user->setMail('toto@tata.fr');
        $user->setMotDePasse('Admin');
        $user->setRole('Admin');

        $entityManager->persist($user);
        $entityManager->flush();
        return new Response('Bonjour'+$user->getNom()+' '+$user->getPrenom()+' votre inscription à bien été prise en compte !');
    }


    public function index(): Response
    {
        return $this->render('inscription/index.html.twig', [
            'controller_name' => 'InscriptionController',
        ]);
    }
}
