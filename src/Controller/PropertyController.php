<?php
namespace App\Controller;

use App\Entity\Propriete;
use App\Repository\ProprieteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

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
     * @return Response
     */
    public function index () : Response {

        // \Doctrine\Persistence\ManagerRegistry $doctrine
        // for ($i = 0; $i < 1000; $i++) {
        //     enregistrerLivre($doctrine, "Charles", "jimmy_insistant", "Dickens_Gurney_head.jpg", null, "");
        // }

        $livres = $this->repository->trouveEtOrdonneParNotesDesc();

        return $this->render("propriete/index.html.twig", [
            "menu_courant" => "proprietes",
            "livres" => $livres,
        ]);

    }
}
?>