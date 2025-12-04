<?php

namespace App\Entity;

use App\Repository\PaymentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaymentRepository::class)]
class Payment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $Montant = null;

    #[ORM\Column(length: 255)]
    private ?string $Methode = null;

    #[ORM\Column(length: 255)]
    private ?string $Statut = null;

    #[ORM\Column]
    private ?\DateTime $DatePaiement = null;

    #[ORM\Column]
    private ?int $TransactionID = null;

    #[ORM\Column]
    private ?int $IDReservation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?float
    {
        return $this->Montant;
    }

    public function setMontant(float $Montant): static
    {
        $this->Montant = $Montant;

        return $this;
    }

    public function getMethode(): ?string
    {
        return $this->Methode;
    }

    public function setMethode(string $Methode): static
    {
        $this->Methode = $Methode;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->Statut;
    }

    public function setStatut(string $Statut): static
    {
        $this->Statut = $Statut;

        return $this;
    }

    public function getDatePaiement(): ?\DateTime
    {
        return $this->DatePaiement;
    }

    public function setDatePaiement(\DateTime $DatePaiement): static
    {
        $this->DatePaiement = $DatePaiement;

        return $this;
    }

    public function getTransactionID(): ?int
    {
        return $this->TransactionID;
    }

    public function setTransactionID(int $TransactionID): static
    {
        $this->TransactionID = $TransactionID;

        return $this;
    }

    public function getIDReservation(): ?int
    {
        return $this->IDReservation;
    }

    public function setIDReservation(int $IDReservation): static
    {
        $this->IDReservation = $IDReservation;

        return $this;
    }
}
