<?php

namespace App\Entity;

use App\Repository\ProprieteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProprieteRepository::class)
 */
class Propriete
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="text")
     */
    private $resume;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombre_etoiles;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $depositaire;

    /**
     * @ORM\Column(type="text")
     */
    private $premiere_page;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $livre;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombre_pages;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $auteur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $isbn;

    /**
     * @ORM\Column(type="datetime")
     */
    private $depose_a;

    public function __construct() {
        $this->depose_a = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getNombreEtoiles(): ?int
    {
        return $this->nombre_etoiles;
    }

    public function setNombreEtoiles(int $nombre_etoiles): self
    {
        $this->nombre_etoiles = $nombre_etoiles;

        return $this;
    }

    public function getDepositaire(): ?string
    {
        return $this->depositaire;
    }

    public function setDepositaire(string $depositaire): self
    {
        $this->depositaire = $depositaire;

        return $this;
    }

    public function getPremierePage(): ?string
    {
        return $this->premiere_page;
    }

    public function setPremierePage(string $premiere_page): self
    {
        $this->premiere_page = $premiere_page;

        return $this;
    }

    public function getLivre(): ?string
    {
        return $this->livre;
    }

    public function setLivre(string $livre): self
    {
        $this->livre = $livre;

        return $this;
    }

    public function getNombrePages(): ?int
    {
        return $this->nombre_pages;
    }

    public function setNombrePages(int $nombre_pages): self
    {
        $this->nombre_pages = $nombre_pages;

        return $this;
    }

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(?string $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(?string $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }

    public function getDeposeA(): ?\DateTimeInterface
    {
        return $this->depose_a;
    }

    public function setDeposeA(\DateTimeInterface $depose_a): self
    {
        $this->depose_a = $depose_a;

        return $this;
    }
}
