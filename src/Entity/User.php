<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="username", type="string", length=255)
     */
    private $username;
 

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @ORM\ManyToOne(targetEntity=Classe::class, inversedBy="userId")
     * @ORM\JoinColumn(nullable=true)
     */
    private $classId;

    /**
     * @ORM\ManyToOne(targetEntity=Exam::class, inversedBy="userId")
     * @ORM\JoinColumn(nullable=true)
     */
    private $examId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\OneToOne(targetEntity=Profil::class, mappedBy="userId", cascade={"persist", "remove"})
     */
    private $profilId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getRoles(): ?array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getClassId(): ?Classe
    {
        return $this->classId;
    }

    public function setClassId(?Classe $classId): self
    {
        $this->classId = $classId;

        return $this;
    }

    public function getExamId(): ?Exam
    {
        return $this->examId;
    }

    public function setExamId(?Exam $examId): self
    {
        $this->examId = $examId;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getProfilId(): ?Profil
    {
        return $this->profilId;
    }

    public function setProfilId(Profil $profilId): self
    {
        $this->profilId = $profilId;

        // set the owning side of the relation if necessary
        if ($profilId->getUserId() !== $this) {
            $profilId->setUserId($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->username;
    }
}
