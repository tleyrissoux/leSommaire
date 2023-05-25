<?php

namespace App\Controller\Admin;

use App\Entity\Propriete;
use App\Form\LivreType;
use App\Repository\ProprieteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

class BookController extends AbstractController {

    /**
     * @var ProprieteRepository
     */
    private $repository;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(ProprieteRepository $repository, EntityManagerInterface $entityManager) {
        $this->repository = $repository;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/admin", name = "admin.livre.index")
     * @return Response
     */
    public function index() {

        $livres = $this->repository->findAll();

        return $this->render("admin/livre/index.html.twig", compact("livres"));
    }

    /**
     * @param Request $requete
     * @Route("admin/livre/ajout", name = "admin.livre.ajout")
     */
    public function ajout(Request $requete) {
        
        $livre = new Propriete();

        $formulaire = $this->createForm(LivreType::class, $livre);
        
        $formulaire->handleRequest($requete);

        if ($formulaire->isSubmitted() && $formulaire->isValid()) {
            $this->entityManager->persist($livre);
            $this->entityManager->flush();
            return $this->redirectToRoute("admin.livre.index");
        }

        return $this->render("admin/livre/ajout.html.twig", [
            "livre" => $livre,
            "formulaire" => $formulaire->createView(),
        ]);
    }

    /**
     * @Route("/admin/livre/{id}", name = "admin.livre.editer", methods = "GET|POST")
     * @param Propriete $livre
     * @param Request $requete
     * @return Response
     */
    public function editer(Propriete $livre, Request $requete)
    {

        $formulaire = $this->createForm(LivreType::class, $livre);
        
        $formulaire->handleRequest($requete);
        if ($formulaire->isSubmitted() && $formulaire->isValid()) {
            $this->entityManager->flush();
            return $this->redirectToRoute("admin.livre.index");
        }

        return $this->render("admin/livre/editer.html.twig", [
            "livre" => $livre,
            "formulaire" => $formulaire->createView(),
        ]);
    }

    /**
     * @Route("/admin/livre/{id}", name = "admin.livre.supprimer", methods = "DELETE")
     * @param Propriete $livre
     * @param Request $requete
     * @return RedirectResponse
     */
    public function supprimer(Propriete $livre, Request $requete) {

        if ($this->isCsrfTokenValid("supprimer". $livre->getId(), $requete->get("_token"))) {
            $this->entityManager->remove($livre);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute("admin.livre.index");
    }

}