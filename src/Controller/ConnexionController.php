<?php

namespace App\Controller;

use App\Repository\UtilisateursRepository;
use App\Repository\VoitureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class ConnexionController extends AbstractController
{
    /**
     * @Route("/connexion", name="app_connex")
     */
    public function connexion(UtilisateursRepository $repo, VoitureRepository $repoVehicule): Response
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
            $vehicule = $user->getVehicule();

            $session = new Session();
            $session->set('identifiant', $identifiant);
            $session->set('nom', $nom);
            $session->set('prenom', $prenom);
            $session->set('role', $role);

            $_SESSION['id']= $identifiant;
            header("Location: {{role}}");

            if($role == "administrateur"){
                return $this->render('administration/index.html.twig', [
                    'controller_name' => 'AdministrationController',
                ]);
            }elseif ($role == "intervenant") {
                $listeVehicules = $repoVehicule->findAll();
                $user = $repo->findUser($identifiant);
                if ($vehicule) {                    
                    return $this->render('intervenant_fin/index.html.twig', [
                        'controller_name' => 'IntervenantFinController',
                        'lesVehicules' => $listeVehicules,
                        'user' => $user
                    ]);
                }
                return $this->render('intervenant_debut/intervenant_debut.twig', [
                    'controller_name' => 'IntervenantDebutController',
                    'lesVehicules' => $listeVehicules
                ]);
            }elseif ($role == "administratif") {
                return $this->render('administratif/index.html.twig', [
                    'controller_name' => 'AdministratifController',
                ]);
            }else {
                return $this->render('comptabilite/index.html.twig', [
                    'controller_name' => 'ComptabiliteController',
                ]);
            }
        }else{
            ?>
            <script>window.alert("Le mot de passe ou l'identifiant sont incorrect ! ")</script>

            <?php
            return $this->render('login/index.html.twig', [
                'controller_name' => 'LoginController'
            ]);
        }

    }
}
