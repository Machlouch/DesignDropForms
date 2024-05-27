<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestionRepository::class)]
class Question
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\OneToMany(targetEntity: Answer::class, mappedBy: 'Question', orphanRemoval: true)]
    private Collection $answers;

    #[ORM\ManyToOne(inversedBy: 'questions')]
    private ?Projet $projet = null;

    #[ORM\Column(length: 255)]
    private ?string $contenu = null;



    
    #[ORM\Column(length: 255)]
    private $fontFamily;

    #[ORM\Column(length: 50)]
    private $fontSize;

    #[ORM\Column(length: 255)]
    private $textStyle;

    #[ORM\Column(length: 50)]
    private $textAlignment;

    #[ORM\Column(length: 255)]
    private $buttonFontFamily;

    #[ORM\Column(length: 255)]
    private $buttonTextStyle;

    #[ORM\Column(length: 50)]
    private $buttonTextAlignment;

    #[ORM\Column(length: 50)]
    private $buttonBackgroundSize;

    #[ORM\Column(type: 'integer')]
    private $buttonRadius;

 

    public function getFontFamily(): ?string
    {
        return $this->fontFamily;
    }

    public function setFontFamily(string $fontFamily): self
    {
        $this->fontFamily = $fontFamily;

        return $this;
    }

    public function getFontSize(): ?string
    {
        return $this->fontSize;
    }

    public function setFontSize(string $fontSize): self
    {
        $this->fontSize = $fontSize;

        return $this;
    }

    public function getTextStyle(): ?string
    {
        return $this->textStyle;
    }

    public function setTextStyle(string $textStyle): self
    {
        $this->textStyle = $textStyle;

        return $this;
    }

    public function getTextAlignment(): ?string
    {
        return $this->textAlignment;
    }

    public function setTextAlignment(string $textAlignment): self
    {
        $this->textAlignment = $textAlignment;

        return $this;
    }

    public function getButtonFontFamily(): ?string
    {
        return $this->buttonFontFamily;
    }

    public function setButtonFontFamily(string $buttonFontFamily): self
    {
        $this->buttonFontFamily = $buttonFontFamily;

        return $this;
    }

    public function getButtonTextStyle(): ?string
    {
        return $this->buttonTextStyle;
    }

    public function setButtonTextStyle(string $buttonTextStyle): self
    {
        $this->buttonTextStyle = $buttonTextStyle;

        return $this;
    }

    public function getButtonTextAlignment(): ?string
    {
        return $this->buttonTextAlignment;
    }

    public function setButtonTextAlignment(string $buttonTextAlignment): self
    {
        $this->buttonTextAlignment = $buttonTextAlignment;

        return $this;
    }

    public function getButtonBackgroundSize(): ?string
    {
        return $this->buttonBackgroundSize;
    }

    public function setButtonBackgroundSize(string $buttonBackgroundSize): self
    {
        $this->buttonBackgroundSize = $buttonBackgroundSize;

        return $this;
    }

    public function getButtonRadius(): ?int
    {
        return $this->buttonRadius;
    }

    public function setButtonRadius(int $buttonRadius): self
    {
        $this->buttonRadius = $buttonRadius;

        return $this;
    }



    public function __construct()
    {
        $this->answers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }



    /**
     * @return Collection<int, Answer>
     */
    public function getAnswers(): Collection
    {
        return $this->answers;
    }

    public function addAnswer(Answer $answer): static
    {
        if (!$this->answers->contains($answer)) {
            $this->answers->add($answer);
            $answer->setQuestion($this);
        }

        return $this;
    }

    public function removeAnswer(Answer $answer): static
    {
        if ($this->answers->removeElement($answer)) {
            // set the owning side to null (unless already changed)
            if ($answer->getQuestion() === $this) {
                $answer->setQuestion(null);
            }
        }

        return $this;
    }

    public function getProjet(): ?Projet
    {
        return $this->projet;
    }

    public function setProjet(?Projet $projet): static
    {
        $this->projet = $projet;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): static
    {
        $this->contenu = $contenu;

        return $this;
    }
}
