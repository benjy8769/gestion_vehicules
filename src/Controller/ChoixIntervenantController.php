<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class ChoixIntervenantController extends AbstractController
{
    #[Route('/choixIntervenant', name: 'app_choix')]
    public function index(): Response
    {
        $request = Request::createFromGlobals();
        $debut = $request->get('debut');
        $fin = $request->get('fin');

        return $this->render('intervenant/index.html.twig', [
            'controller_name' => 'IntervenantController',
            $debut, $fin
        ]);
    }
}
