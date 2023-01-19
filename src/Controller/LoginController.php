<?php

namespace App\Controller;

use App\Entity\Utilisateurs;
use App\Repository\UtilisateursRepository;
use ContainerHLBdPxf\getUtilisateursRepositoryService;
use phpDocumentor\Reflection\PseudoTypes\True_;
use PHPUnit\Framework\Test;

use Doctrine\Persistence\ManagerRegistry;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class LoginController extends AbstractController
{
    
    #[Route('/login', name: 'app_login')]
    public function connexion(UtilisateursRepository $repo): Response
    {

        $request = Request::createFromGlobals();
        $identifiant = $request->get('user_login');
        $mdp = $request->get('mdp_login');

        $user = $repo->findUser($identifiant);

        if($user->verifier_utilisateur($mdp, $identifiant) == True) 
        {
            $nom = $user->getNom();
            $prenom = $user->getPrenom();
            $role = $user->getRoles();

            $session = new Session();
            $session->set('nom', $nom);
            $session->set('prenom', $prenom);
            $session->set('role', $role);

            $_SESSION['id']= $identifiant;
            header("Location: personnel");

             return $this->render('choix/index.html.twig', [
                'controller_name' => 'ChoixController',
                'role' => $role, 'nom' => $nom, 'prenom' => $prenom
            ]);
        }else{
            echo('Le mot de passe et/ou l\'identifiant sont incorrects !');

            
            return $this->render('login/index.html.twig', [
                'controller_name' => 'LoginController'
            ]);
        }

    }
}
