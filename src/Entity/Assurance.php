<?php

namespace App\Entity;

use App\Repository\AssuranceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AssuranceRepository::class)]
class Assurance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'assurance', targetEntity: EstAssure::class, orphanRemoval: true)]
    private Collection $identifiantAssurance;

    public function __construct()
    {
        $this->identifiantAssurance = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, estAssure>
     */
    public function getIdentifiantAssurance(): Collection
    {
        return $this->identifiantAssurance;
    }

    public function addIdentifiantAssurance(estAssure $identifiantAssurance): self
    {
        if (!$this->identifiantAssurance->contains($identifiantAssurance)) {
            $this->identifiantAssurance->add($identifiantAssurance);
            $identifiantAssurance->setAssurance($this);
        }

        return $this;
    }

    public function removeIdentifiantAssurance(estAssure $identifiantAssurance): self
    {
        if ($this->identifiantAssurance->removeElement($identifiantAssurance)) {
            // set the owning side to null (unless already changed)
            if ($identifiantAssurance->getAssurance() === $this) {
                $identifiantAssurance->setAssurance(null);
            }
        }

        return $this;
    }
}
