<?php

namespace App\Controller;

use App\Repository\ProprieteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class HomeController extends AbstractController {

    /**
     * @param ProprieteRepository $repository
     * @return Response
     */
    public function index(ProprieteRepository $repository) : Response {
        
        $livres = $repository->trouveLesDerniers();

        return $this->render("pages/home.html.twig", [
            "livres" => $livres,
        ]);

    }

}
