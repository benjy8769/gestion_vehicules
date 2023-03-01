<?php

namespace App\Controller;


use App\Repository\UtilisateursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;

class IntervenantFinController extends AbstractController
{
        /**
     * @Route("/Intervenant/Retour_vehicule", name="fin_intervenant")
     */
    public function fin(UtilisateursRepository $repo): Response
    {
        $session = new Session();

        $identifiant = $session->get('identifiant');

        $user = $repo->findUser($identifiant);
            
        return $this->render('intervenant_fin/index.html.twig', [
            'controller_name' => 'IntervenantFinController',
            'user' => $user
        ]);
    }
}
