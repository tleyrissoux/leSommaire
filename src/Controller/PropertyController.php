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

    public function enregistreLivre($doctrine, $auteur, $depositaire, $image, $isbn, $chemin_livre, $nombre_etoiles, $nombre_pages, $premiere_page, $resume, $titre) {
        $livre = new Propriete();
        $livre->setAuteur($auteur);
        $livre->setDepositaire($depositaire);
        $livre->setImage($image);
        if ($isbn != null)
            $livre->setIsbn($isbn);
        $livre->setLivre($chemin_livre);
        $livre->setNombreEtoiles($nombre_etoiles);
        $livre->setNombrePages($nombre_pages);
        $livre->setPremierePage($premiere_page);
        $livre->setResume($resume);
        $livre->setTitre($titre);
        $entity_manager = $doctrine->getManager();
        $entity_manager->persist($livre);
        $entity_manager->flush();
    }

    /**
     * @Route("/livres", name = "livre.index")
     * @return Response
     */
    public function index () : Response {

        // \Doctrine\Persistence\ManagerRegistry $doctrine
        // for ($i = 0; $i < 1000; $i++) {
        //     enregistrerLivre($doctrine, "Charles", "jimmy_insistant", "Dickens_Gurney_head.jpg", null, "");
        // }

        $livres = $this->repository->trouveEtOrdonneParNotesDesc();

        return $this->render("livre/index.html.twig", [
            "menu_courant" => "proprietes",
            "livres" => $livres,
        ]);

    }

    /**
     * @Route("/livres/{slug}-{id}", name = "livre.details", requirements = {"slug": "[a-z0-9\-]*"})
     * @param Propriete $livre
     * @return Response
     */
    public function details(Propriete $livre) : Response {

        // $livre = $this->repository->find($id);
        
        return $this->render("livre/details.html.twig", [
            "menu_courant" => "proprietes",
            "livre" => $livre,
        ]);

    }

    /**
     * @Route("/livres/{slug}-{id}/premiere_page", name = "livre.premiere_page", requirements = {"slug": "[a-z0-9\-]*"})
     * @param Propriete $livre
     * @return Response
     */
    public function premierePage(Propriete $livre) : Response {
        return $this->render("livre/premiere-page.html.twig", [
            // "menu_courant" => "proprietes",
            "livre" => $livre,
        ]);
    }

}
?>