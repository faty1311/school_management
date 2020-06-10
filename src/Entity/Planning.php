<?php

namespace App\Entity;

use App\Repository\PlanningRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlanningRepository::class)
 */
class Planning
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\OneToOne(targetEntity=User::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $userId;

    /**
     * @ORM\OneToOne(targetEntity=Classe::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $classId;

    /**
     * @ORM\ManyToMany(targetEntity=Subject::class)
     */
    private $subjectId;

    public function __construct()
    {
        $this->subjectId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->userId;
    }

    public function setUserId(User $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getClassId(): ?Classe
    {
        return $this->classId;
    }

    public function setClassId(Classe $classId): self
    {
        $this->classId = $classId;

        return $this;
    }

    /**
     * @return Collection|subject[]
     */
    public function getSubjectId(): Collection
    {
        return $this->subjectId;
    }

    public function addSubjectId(subject $subjectId): self
    {
        if (!$this->subjectId->contains($subjectId)) {
            $this->subjectId[] = $subjectId;
        }

        return $this;
    }

    public function removeSubjectId(subject $subjectId): self
    {
        if ($this->subjectId->contains($subjectId)) {
            $this->subjectId->removeElement($subjectId);
        }

        return $this;
    }
}
