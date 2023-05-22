<?php
namespace App\Controller;

use App\Entity\Propriete;
use App\Repository\ProprieteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController {

    /**
     * @var ProprieteRepository
     */
    private $repository;

    public function __construct(ProprieteRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * @return Response
     */
    public function index () : Response {

        return $this->render("propriete/index.html.twig", [
            "menu_courant" => "proprietes",
        ]);

    }

}

?>