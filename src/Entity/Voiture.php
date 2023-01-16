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

    #[ORM\Column(type: Types::TEXT, nullable: true)]
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

    
    #[ORM\column(nullable: true)]
    private ?int $num_geocoyote = null;

    #[ORM\OneToMany(mappedBy: 'voiture', targetEntity: UtiliserVehicules::class, orphanRemoval: true)]
    private Collection $idVoiture;

    #[ORM\OneToOne(inversedBy: 'voiture', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?EstAssure $identifiantVoiture = null;

    public function __construct()
    {
        $this->idVoiture = new ArrayCollection();
    }

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
        return $this->geocoyote;
    }

    public function setNumGeocoyote(int $num_geocoyote): self
    {
        $this->geocoyote = $num_geocoyote;

        return $this;
    }

    /**
     * @return Collection<int, utiliserVehicules>
     */
    public function getIdVoiture(): Collection
    {
        return $this->idVoiture;
    }

    public function addIdVoiture(utiliserVehicules $idVoiture): self
    {
        if (!$this->idVoiture->contains($idVoiture)) {
            $this->idVoiture->add($idVoiture);
            $idVoiture->setVoiture($this);
        }

        return $this;
    }

    public function removeIdVoiture(utiliserVehicules $idVoiture): self
    {
        if ($this->idVoiture->removeElement($idVoiture)) {
            // set the owning side to null (unless already changed)
            if ($idVoiture->getVoiture() === $this) {
                $idVoiture->setVoiture(null);
            }
        }

        return $this;
    }

    public function getIdentifiantVoiture(): ?estAssure
    {
        return $this->identifiantVoiture;
    }

    public function setIdentifiantVoiture(estAssure $identifiantVoiture): self
    {
        $this->identifiantVoiture = $identifiantVoiture;

        return $this;
    }
}
