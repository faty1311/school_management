<?php

namespace App\Entity;

use App\Repository\AbsenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AbsenceRepository::class)
 */
class Absence
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
     * @ORM\ManyToMany(targetEntity=User::class)
     */
    private $userId;

    /**
     * @ORM\ManyToMany(targetEntity=Subject::class)
     */
    private $subjectId;

    /**
     * @ORM\Column(type="boolean")
     */
    private $attend;

    public function __construct()
    {
        $this->userId = new ArrayCollection();
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

    /**
     * @return Collection|User[]
     */
    public function getUserId(): Collection
    {
        return $this->userId;
    }

    public function addUserId(User $userId): self
    {
        if (!$this->userId->contains($userId)) {
            $this->userId[] = $userId;
        }

        return $this;
    }

    public function removeUserId(User $userId): self
    {
        if ($this->userId->contains($userId)) {
            $this->userId->removeElement($userId);
        }

        return $this;
    }

    /**
     * @return Collection|Subject[]
     */
    public function getSubjectId(): Collection
    {
        return $this->subjectId;
    }

    public function addSubjectId(Subject $subjectId): self
    {
        if (!$this->subjectId->contains($subjectId)) {
            $this->subjectId[] = $subjectId;
        }

        return $this;
    }

    public function removeSubjectId(Subject $subjectId): self
    {
        if ($this->subjectId->contains($subjectId)) {
            $this->subjectId->removeElement($subjectId);
        }

        return $this;
    }

    public function getAttend(): ?bool
    {
        return $this->attend;
    }

    public function setAttend(bool $attend): self
    {
        $this->attend = $attend;

        return $this;
    }
}
