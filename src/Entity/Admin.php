<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdminRepository::class)
 */
class Admin
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_admin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mdp_admin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAdmin(): ?string
    {
        return $this->nom_admin;
    }

    public function setNomAdmin(string $nom_admin): self
    {
        $this->nom_admin = $nom_admin;

        return $this;
    }

    public function getMdpAdmin(): ?string
    {
        return $this->mdp_admin;
    }

    public function setMdpAdmin(string $mdp_admin): self
    {
        $this->mdp_admin = $mdp_admin;

        return $this;
    }
}
