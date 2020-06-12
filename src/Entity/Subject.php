<?php

namespace App\Entity;

use App\Repository\SubjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SubjectRepository::class)
 */
class Subject
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
     * @ORM\ManyToOne(targetEntity=Exam::class, inversedBy="subjectId")
     * @ORM\JoinColumn(nullable=false)
     */
    private $examId;

    /**
     * @ORM\OneToMany(targetEntity=Lessons::class, mappedBy="subjectId", orphanRemoval=true)
     */
    private $lessons;


    /**
     * @ORM\Column(type="integer")
     */
    private $coefficient;

    /**
     * @ORM\OneToMany(targetEntity=Exam::class, mappedBy="subjects", orphanRemoval=true)
     */
    private $exams;

    public function __construct()
    {
        $this->lessons = new ArrayCollection();
        $this->exams = new ArrayCollection();
    }

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

    /**
     * @return mixed
     */
    public function getExamId()
    {
        return $this->examId;
    }

    /**
     * @param mixed $examId
     */
    public function setExamId($examId): void
    {
        $this->examId = $examId;
    }

    /**
     * @return Collection|Lessons[]
     */
    public function getLessons(): Collection
    {
        return $this->lessons;
    }

    public function addLesson(Lessons $lesson): self
    {
        if (!$this->lessons->contains($lesson)) {
            $this->lessons[] = $lesson;
            $lesson->setSubjectId($this);
        }

        return $this;
    }

    public function removeLesson(Lessons $lesson): self
    {
        if ($this->lessons->contains($lesson)) {
            $this->lessons->removeElement($lesson);
            // set the owning side to null (unless already changed)
            if ($lesson->getSubjectId() === $this) {
                $lesson->setSubjectId(null);
            }
        }

        return $this;
    }


    public function getCoefficient(): ?int
    {
        return $this->coefficient;
    }

    public function setCoefficient(int $coefficient): self
    {
        $this->coefficient = $coefficient;

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return Collection|Exam[]
     */
    public function getExams(): Collection
    {
        return $this->exams;
    }

    public function addExam(Exam $exam): self
    {
        if (!$this->exams->contains($exam)) {
            $this->exams[] = $exam;
            $exam->setSubjects($this);
        }

        return $this;
    }

    public function removeExam(Exam $exam): self
    {
        if ($this->exams->contains($exam)) {
            $this->exams->removeElement($exam);
            // set the owning side to null (unless already changed)
            if ($exam->getSubjects() === $this) {
                $exam->setSubjects(null);
            }
        }

        return $this;
    }
}
