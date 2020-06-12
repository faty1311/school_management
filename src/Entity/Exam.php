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
     * @ORM\ManyToOne(targetEntity=Subject::class, inversedBy="exams")
     * @ORM\JoinColumn(nullable=false)
     */
    private $subjects;


    /**
     * @ORM\OneToOne(targetEntity=Subject::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */

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
     * @return Subject|null
     */
    public function getSubjects(): ?Subject
    {
        return $this->subjects;
    }

    /**
     * @param Subject|null $subjects
     * @return $this
     */
    public function setSubjects(?Subject $subjects): self
    {
        $this->subjects = $subjects;

        return $this;
    }

}