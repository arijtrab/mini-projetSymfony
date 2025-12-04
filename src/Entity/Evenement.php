<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvenementRepository::class)]
class Evenement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idEvents = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: "text")]
    private ?string $description = null;

    #[ORM\Column(type: "datetime")]
    private ?\DateTimeInterface $dateDebut = null;

    #[ORM\Column(type: "datetime")]
    private ?\DateTimeInterface $dateFin = null;

    #[ORM\Column(type: "float")]
    private ?float $prix = null;

    #[ORM\Column(type: "integer")]
    private ?int $capacite = null;

    #[ORM\Column(type: "string", length: 50)]
    private ?string $status = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\Column(type: "integer")]
    private ?int $idCategories = null;

    #[ORM\Column(type: "integer")]
    private ?int $idLocation = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $nomOrganisateur = null;

    // Getters and Setters

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;
        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;
        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;
        return $this;
    }

    public function getCapacite(): ?int
    {
        return $this->capacite;
    }

    public function setCapacite(int $capacite): self
    {
        $this->capacite = $capacite;
        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;
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

    public function getIdCategories(): ?int
    {
        return $this->idCategories;
    }

    public function setIdCategories(int $idCategories): self
    {
        $this->idCategories = $idCategories;
        return $this;
    }

    public function getIdLocation(): ?int
    {
        return $this->idLocation;
    }

    public function setIdLocation(int $idLocation): self
    {
        $this->idLocation = $idLocation;
        return $this;
    }

    public function getNomOrganisateur(): ?string
    {
        return $this->nomOrganisateur;
    }

    public function setNomOrganisateur(string $nomOrganisateur): self
    {
        $this->nomOrganisateur = $nomOrganisateur;
        return $this;
    }
}
