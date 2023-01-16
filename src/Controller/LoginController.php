<?php

namespace App\Controller;

use App\Entity\Utilisateurs;
use ContainerHLBdPxf\getUtilisateursRepositoryService;
use phpDocumentor\Reflection\PseudoTypes\True_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function connexion(): Response
    {

        $user=new Utilisateurs();

        $request = Request::createFromGlobals();
        $utilisateur = $request->get('user_login');
        $mdp = $request->get('mdp_login');

        if($user->verifier_utilisateur($utilisateur, $mdp) == True) 
        {
            $role = $user->getRoles();

             return $this->render('personnel/index.html.twig', [
                'controller_name' => 'PersonnelController',
                $role,
            ]);
        }else{
            echo('Le mot de passe et/ou l\'identifiant sont incorrects !');

            return $this->render('login/index.html.twig', [
                'controller_name' => 'LoginController'
            ]);
        }

    }
}
