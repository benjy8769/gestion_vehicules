<?php

namespace App\Entity;

use App\Repository\EntretienRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntretienRepository::class)]
class Entretien extends Voiture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $ancienneVidange = null;

    #[ORM\Column(nullable: true)]
    private ?int $prochaineVidange = null;

    #[ORM\Column(nullable: true)]
    private ?int $ancienneDistribution = null;

    #[ORM\Column(nullable: true)]
    private ?int $prochaineDistribution = null;

    #[ORM\Column(nullable: true)]
    private ?int $ancienneRevision = null;

    #[ORM\Column(nullable: true)]
    private ?int $prochaineRevision = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $ancienControle = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $prochainControle = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAncienneVidange(): ?int
    {
        return $this->ancienneVidange;
    }

    public function setAncienneVidange(?int $ancienneVidange): self
    {
        $this->ancienneVidange = $ancienneVidange;

        return $this;
    }

    public function getProchaineVidange(): ?int
    {
        return $this->prochaineVidange;
    }

    public function setProchaineVidange(int $prochaineVidange): self
    {
        $this->prochaineVidange = $prochaineVidange;

        return $this;
    }

    public function getAncienneDistribution(): ?int
    {
        return $this->ancienneDistribution;
    }

    public function setAncienneDistribution(?int $ancienneDistribution): self
    {
        $this->ancienneDistribution = $ancienneDistribution;

        return $this;
    }

    public function getProchaineDistribution(): ?int
    {
        return $this->prochaineDistribution;
    }

    public function setProchaineDistribution(int $prochaineDistribution): self
    {
        $this->prochaineDistribution = $prochaineDistribution;

        return $this;
    }

    public function getAncienneRevision(): ?int
    {
        return $this->ancienneRevision;
    }

    public function setAncienneRevision(?int $ancienneRevision): self
    {
        $this->ancienneRevision = $ancienneRevision;

        return $this;
    }

    public function getProchaineRevision(): ?int
    {
        return $this->prochaineRevision;
    }

    public function setProchaineRevision(int $prochaineRevision): self
    {
        $this->prochaineRevision = $prochaineRevision;

        return $this;
    }

    public function getAncienControle(): ?\DateTimeInterface
    {
        return $this->ancienControle;
    }

    public function setAncienControle(?\DateTimeInterface $ancienControle): self
    {
        $this->ancienControle = $ancienControle;

        return $this;
    }

    public function getProchainControle(): ?\DateTimeInterface
    {
        return $this->prochainControle;
    }

    public function setProchainControle(\DateTimeInterface $prochainControle): self
    {
        $this->prochainControle = $prochainControle;

        return $this;
    }
}
