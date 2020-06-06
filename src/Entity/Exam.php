<?php

namespace App\Entity;

use App\Repository\ExamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExamRepository::class)
 */
class Exam
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $mark;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="examId")
     */
    private $userId;

    /**
     * @ORM\OneToMany(targetEntity=Subject::class, mappedBy="examId")
     */
    private $subjectId;

    public function __construct()
    {
        $this->userId = new ArrayCollection();
        $this->subjectId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMark(): ?int
    {
        return $this->mark;
    }

    public function setMark(int $mark): self
    {
        $this->mark = $mark;

        return $this;
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
            $userId->setExamId($this);
        }

        return $this;
    }

    public function removeUserId(User $userId): self
    {
        if ($this->userId->contains($userId)) {
            $this->userId->removeElement($userId);
            // set the owning side to null (unless already changed)
            if ($userId->getExamId() === $this) {
                $userId->setExamId(null);
            }
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
            $subjectId->setExamId($this);
        }

        return $this;
    }

    public function removeSubjectId(Subject $subjectId): self
    {
        if ($this->subjectId->contains($subjectId)) {
            $this->subjectId->removeElement($subjectId);
            // set the owning side to null (unless already changed)
            if ($subjectId->getExamId() === $this) {
                $subjectId->setExamId(null);
            }
        }

        return $this;
    }
}
