<?php

namespace App\Controller;

use App\Repository\UtilisationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LogsVehiculesController extends AbstractController
{
    /**
     * @Route("/logs_vehicules", name="app_logs_vehicules")
     */
    public function index(UtilisationRepository $repo): Response
    {
        $logs_vehicules = $repo->findAll();

        return $this->render('logs_vehicules/index.html.twig', [
            'controller_name' => 'LogsVehiculesController',
            'logs' => $logs_vehicules
        ]);
    }
}
