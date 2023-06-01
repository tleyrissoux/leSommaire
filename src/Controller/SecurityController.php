<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController {

    /**
     * @Route("/login", name = "auth")
     */
    public function login(AuthenticationUtils $authentification) {
        
        $erreur = $authentification->getLastAuthenticationError();
        $dernierIdentifiant = $authentification->getLastUsername();

        return $this->render("securite/auth.html.twig", [
            "dernier_identifiant" => $dernierIdentifiant,
            "erreur" => $erreur,
        ]);
    }

    // /**
    //  * @Route("/logout", name = "app_logout", methods = {"GET"})
    //  */
    // public function logout() : void {
    //     throw new \Exception("N'oubliez pas d'activer la déconnexion dans config/security.yaml");
    // }

}