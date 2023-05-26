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
    //  * @Route("/logout", name = "logout")
    //  */
    // public function logout() {
    //     return $this->redirectToRoute("accueil");
    // }

}