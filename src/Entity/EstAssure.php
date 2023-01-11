<?php

namespace App\Entity;

use App\Repository\EstAssureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstAssureRepository::class)]
class EstAssure
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $numeroAssurance = null;

    #[ORM\Column(nullable: true)]
    private ?float $montantMois = null;

    #[ORM\Column(nullable: true)]
    private ?float $montantAnnee = null;

    #[ORM\ManyToOne(inversedBy: 'identifiantAssurance')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Assurance $assurance = null;

    #[ORM\OneToOne(mappedBy: 'identifiantVoiture', cascade: ['persist', 'remove'])]
    private ?Voiture $voiture = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroAssurance(): ?string
    {
        return $this->numeroAssurance;
    }

    public function setNumeroAssurance(string $numeroAssurance): self
    {
        $this->numeroAssurance = $numeroAssurance;

        return $this;
    }

    public function getMontantMois(): ?float
    {
        return $this->montantMois;
    }

    public function setMontantMois(?float $montantMois): self
    {
        $this->montantMois = $montantMois;

        return $this;
    }

    public function getMontantAnnee(): ?float
    {
        return $this->montantAnnee;
    }

    public function setMontantAnnee(?float $montantAnnee): self
    {
        $this->montantAnnee = $montantAnnee;

        return $this;
    }

    public function getAssurance(): ?Assurance
    {
        return $this->assurance;
    }

    public function setAssurance(?Assurance $assurance): self
    {
        $this->assurance = $assurance;

        return $this;
    }

    public function getVoiture(): ?Voiture
    {
        return $this->voiture;
    }

    public function setVoiture(Voiture $voiture): self
    {
        // set the owning side of the relation if necessary
        if ($voiture->getIdentifiantVoiture() !== $this) {
            $voiture->setIdentifiantVoiture($this);
        }

        $this->voiture = $voiture;

        return $this;
    }
}
