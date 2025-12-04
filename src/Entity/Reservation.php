<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $statut = null;

    #[ORM\Column(type: "datetime")]
    private ?\DateTimeInterface $DateReservation = null;

    #[ORM\Column]
    private ?int $Nombre = null;

    #[ORM\Column]
    private ?int $IdClient = null;

    // Getters and setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;
        return $this;
    }

    public function getDateReservation(): ?\DateTimeInterface
    {
        return $this->DateReservation;
    }

    public function setDateReservation(\DateTimeInterface $DateReservation): self
    {
        $this->DateReservation = $DateReservation;
        return $this;
    }

    public function getNombre(): ?int
    {
        return $this->Nombre;
    }

    public function setNombre(int $Nombre): self
    {
        $this->Nombre = $Nombre;
        return $this;
    }

    public function getIdClient(): ?int
    {
        return $this->IdClient;
    }

    public function setIdClient(int $IdClient): self
    {
        $this->IdClient = $IdClient;
        return $this;
    }
}
