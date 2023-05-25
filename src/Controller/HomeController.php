<?php

namespace App\Controller;

use App\Repository\ProprieteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController {

    /**
     * @Route("/", name = "accueil")
     * @param ProprieteRepository $repository
     * @return Response
     */
    public function index(ProprieteRepository $repository) : Response {
        
        $livres = $repository->trouveLesDerniers();

        return $this->render("pages/accueil.html.twig", [
            "livres" => $livres,
        ]);

    }

}
