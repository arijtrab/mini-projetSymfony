<?php

namespace App\Entity;

use App\Repository\TicketRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TicketRepository::class)]
class Ticket
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Code = null;

    #[ORM\Column]
    private ?int $Quantité = null;

    #[ORM\Column]
    private ?float $TotalPrix = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\Column]
    private ?int $IDEvenement = null;

    #[ORM\Column]
    private ?int $IDReseravtion = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?int
    {
        return $this->Code;
    }

    public function setCode(int $Code): static
    {
        $this->Code = $Code;

        return $this;
    }

    public function getQuantité(): ?int
    {
        return $this->Quantité;
    }

    public function setQuantité(int $Quantité): static
    {
        $this->Quantité = $Quantité;

        return $this;
    }

    public function getTotalPrix(): ?float
    {
        return $this->TotalPrix;
    }

    public function setTotalPrix(float $TotalPrix): static
    {
        $this->TotalPrix = $TotalPrix;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getIDEvenement(): ?int
    {
        return $this->IDEvenement;
    }

    public function setIDEvenement(int $IDEvenement): static
    {
        $this->IDEvenement = $IDEvenement;

        return $this;
    }

    public function getIDReseravtion(): ?int
    {
        return $this->IDReseravtion;
    }

    public function setIDReseravtion(int $IDReseravtion): static
    {
        $this->IDReseravtion = $IDReseravtion;

        return $this;
    }
}
