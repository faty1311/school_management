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
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $function;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @ORM\ManyToOne(targetEntity=Classe::class, inversedBy="userId")
     * @ORM\JoinColumn(nullable=false)
     */
    private $classId;

    /**
     * @ORM\ManyToOne(targetEntity=Exam::class, inversedBy="userId")
     * @ORM\JoinColumn(nullable=false)
     */
    private $examId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getFunction(): ?string
    {
        return $this->function;
    }

    public function setFunction(string $function): self
    {
        $this->function = $function;

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
}
