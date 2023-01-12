<?php

namespace App\Entity;

use App\Repository\UtilisateursRepository;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\DependencyInjection\Attribute\Autoconfigure;

#[ORM\Entity(repositoryClass: UtilisateursRepository::class)]
class Utilisateurs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;
 

    #[ORM\Column(length: 255)]
    private ?string $nom = "";

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $identifiant = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mail = null;

    #[ORM\Column(length: 255)]
    private ?string $motDePasse = null;

    #[ORM\Column(length: 255)]
    private ?string $role = null;

    #[ORM\OneToOne(inversedBy: 'utilisateurs', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?UtiliserVehicules $idUtilisateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
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

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->motDePasse;
    }

    public function setMotDePasse(string $motDePasse): self
    {
        $this->motDePasse = $motDePasse;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getIdUtilisateur(): ?utiliserVehicules
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(utiliserVehicules $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }
}
