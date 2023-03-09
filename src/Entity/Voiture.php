<?php

namespace App\Entity;

use App\Repository\VoitureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoitureRepository::class)]
class Voiture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $identifiant = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $marque = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $modele = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $immatriculation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $kilometrage = null;

    #[ORM\Column(length: 255)]
    private ?string $site = null;

    #[ORM\Column(length: 262144, nullable: true)]
    private ?string $observations = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $carburant = null;

    #[ORM\Column]
    private ?String $garantie = null;

    #[ORM\Column]
    private ?bool $estDisponible = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $numeroSerie = null;

    #[ORM\Column]
    private ?bool $geocoyote = null;

    #[ORM\Column(nullable: true)]
    private ?int $numGeocoyote = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ancienneVidange = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prochaineVidange = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ancienneDistribution = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prochaineDistribution = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ancienneRevision = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prochaineRevision = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ancienCT = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prochainCT = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nomAssurance = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $dateEcheanceAssurance = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $proprietaire = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $typeFinancement = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $finFinancement = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdentifiant(): ?string
    {
        return $this->identifiant;
    }

    public function setIdentifiant(string $identifiant): self
    {
        $this->identifiant = $identifiant;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(?string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(?string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getImmatriculation(): ?string
    {
        return $this->immatriculation;
    }

    public function setImmatriculation(?string $immatriculation): self
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    public function getKilometrage(): ?string
    {
        return $this->kilometrage;
    }

    public function setKilometrage(?string $kilometrage): self
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    public function getSite(): ?string
    {
        return $this->site;
    }

    public function setSite(string $site): self
    {
        $this->site = $site;

        return $this;
    }

    public function getObservations(): ?string
    {
        return $this->observations;
    }

    public function setObservations(?string $observations): self
    {
        $this->observations = $observations;

        return $this;
    }

    public function getCarburant(): ?string
    {
        return $this->carburant;
    }

    public function setCarburant(?string $carburant): self
    {
        $this->carburant = $carburant;

        return $this;
    }

    public function getGarantie(): ?string
    {
        return $this->garantie;
    }

    public function setGarantie(?string $garantie): self
    {
        $this->garantie = $garantie;

        return $this;
    }

    public function isEstDisponible(): ?bool
    {
        return $this->estDisponible;
    }

    public function setEstDisponible(bool $estDisponible): self
    {
        $this->estDisponible = $estDisponible;

        return $this;
    }

    public function getNumeroSerie(): ?string
    {
        return $this->numeroSerie;
    }

    public function setNumeroSerie(?string $numeroSerie): self
    {
        $this->numeroSerie = $numeroSerie;

        return $this;
    }

    public function isGeocoyote(): ?bool
    {
        return $this->geocoyote;
    }

    public function setGeocoyote(bool $geocoyote): self
    {
        $this->geocoyote = $geocoyote;

        return $this;
    }

    public function getNumGeocoyote(): ?int
    {
        return $this->numGeocoyote;
    }

    public function setNumGeocoyote(?int $numGeocoyote): self
    {
        $this->numGeocoyote = $numGeocoyote;

        return $this;
    }

    public function getAncienneVidange(): ?string
    {
        return $this->ancienneVidange;
    }

    public function setAncienneVidange(?string $ancienneVidange)
    {
        $this->ancienneVidange = $ancienneVidange;
    }
    
    public function getProchaineVidange(): ?string
    {
        return $this->prochaineVidange;
    }

    public function setProchaineVidange(?string $prochaineVidange): self
    {
        $this->prochaineVidange = $prochaineVidange;

        return $this;
    }

    public function getAncienneDistribution(): ?string
    {
        return $this->ancienneDistribution;
    }

    public function setAncienneDistribution(?string $ancienneDistribution): self
    {
        $this->ancienneDistribution = $ancienneDistribution;

        return $this;
    }

    public function getProchaineDistribution(): ?string
    {
        return $this->prochaineDistribution;
    }

    public function setProchaineDistribution(?string $prochaineDistribution): self
    {
        $this->prochaineDistribution = $prochaineDistribution;

        return $this;
    }

    public function getAncienneRevision(): ?string
    {
        return $this->ancienneRevision;
    }

    public function setAncienneRevision(?string $ancienneRevision): self
    {
        $this->ancienneRevision = $ancienneRevision;

        return $this;
    }

    public function getProchaineRevision(): ?string
    {
        return $this->prochaineRevision;
    }

    public function setProchaineRevision(?string $prochaineRevision): self
    {
        $this->prochaineRevision = $prochaineRevision;

        return $this;
    }

    public function getAncienCT(): ?string
    {
        return $this->ancienCT;
    }

    public function setAncienCT(?string $ancienCT): self
    {
        $this->ancienCT = $ancienCT;

        return $this;
    }

    public function getProchainCT(): ?string
    {
        return $this->prochainCT;
    }

    public function setProchainCT(?string $prochainCT): self
    {
        $this->prochainCT = $prochainCT;

        return $this;
    }

    public function getNomAssurance(): ?string
    {
        return $this->nomAssurance;
    }

    public function setNomAssurance(?string $nomAssurance): self
    {
        $this->nomAssurance = $nomAssurance;

        return $this;
    }

    public function getDateEcheanceAssurance(): ?string
    {
        return $this->dateEcheanceAssurance;
    }

    public function setDateEcheanceAssurance(?string $dateEcheanceAssurance): self
    {
        $this->dateEcheanceAssurance = $dateEcheanceAssurance;

        return $this;
    }

    public function getProprietaire(): ?string
    {
        return $this->proprietaire;
    }

    public function setProprietaire(?string $proprietaire): self
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    public function getTypeFinancement(): ?string
    {
        return $this->typeFinancement;
    }

    public function setTypeFinancement(?string $typeFinancement): self
    {
        $this->typeFinancement = $typeFinancement;

        return $this;
    }

    public function getFinFinancement(): ?string
    {
        return $this->finFinancement;
    }

    public function setFinFinancement(?string $finFinancement): self
    {
        $this->finFinancement = $finFinancement;

        return $this;
    }
}
