<?php

namespace App\Entity;

use App\Repository\UtilisateursRepository;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Boolean;
use phpDocumentor\Reflection\Types\Integer;

#[ORM\Entity(repositoryClass: UtilisateursRepository::class)]
class Utilisateurs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $identifiant = null;

    #[ORM\Column(length:255)]
    private ?string $role = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $mail = null;

    /**
     * @var string The hashed password
     */
    #[ORM\Column(nullable:false)]
    private ?string $mot_de_passe = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdentifiant(): ?string
    {
        return $this->identifiant;
    }

    public function setIdentifiant(string $username): self
    {
        $this->identifiant = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): string
    {
        return (string) $this->role;
    }

    public function setRoles(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        //print_r("//".$this->mot_de_passe);
        return (string) $this->mot_de_passe;
    }

    public function setPassword(string $password): self
    {
        $this->mot_de_passe = $password;

        return $this;
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

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function verifier_utilisateur($mdp, $utilisateur): bool
    {
        if($utilisateur == $this->getIdentifiant() && password_verify($mdp, $this->getPassword()))
        {
            return true;
        }else{
            return false;
        }
    }

}
