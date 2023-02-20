<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;


class LogoutController extends AbstractController
{
    /**
     * @Route("/logout", name="app_logout")
     */
    public function index(): Response
    {
        $session = new Session();
        $session->set('identifiant', "");
        $session->set('nom', "");
        $session->set('prenom', "");
        $session->set('role', "");

        return $this->render('login/index.html.twig', [
            'controller_name' => 'LoginController',
        ]);
    }
}
