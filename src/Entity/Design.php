<?php

namespace App\Entity;

use App\Repository\DesignRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Enum\StyleButton;
use App\Enum\RadiusLevel;

#[ORM\Entity(repositoryClass: DesignRepository::class)]
class Design
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $logo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $backgroundColor = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $backgroundUrl = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $backgroundStyle = null;

    #[ORM\Column(length: 255)]
    private ?string $font = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $color = null;

    #[ORM\Column(nullable: true)]
    private ?int $fontsize = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isBold = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isItalic = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isUnderline = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $align = null;

    #[ORM\Column(nullable: true)]
    private ?float $cardOpacity = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cardBackgroundColor = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cardBorderColor = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cardBorderSize = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cardRiduis = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $buttonBackgroundColor = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $buttonBorderColor = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $buttonStyle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $buttonRiduis = null;

    #[ORM\OneToMany(targetEntity: Survey::class, mappedBy: 'design', orphanRemoval: true)]
    private Collection $surveys;

    public function __construct()
    {
        $this->surveys = new ArrayCollection();
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

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): static
    {
        $this->logo = $logo;

        return $this;
    }

    public function getBackgroundColor(): ?string
    {
        return $this->backgroundColor;
    }

    public function setBackgroundColor(?string $backgroundColor): static
    {
        $this->backgroundColor = $backgroundColor;

        return $this;
    }

    public function getBackgroundUrl(): ?string
    {
        return $this->backgroundUrl;
    }

    public function setBackgroundUrl(?string $backgroundUrl): static
    {
        $this->backgroundUrl = $backgroundUrl;

        return $this;
    }

    public function getBackgroundStyle(): ?string
    {
        return $this->backgroundStyle;
    }

    public function setBackgroundStyle(?string $backgroundStyle): static
    {
        $this->backgroundStyle = $backgroundStyle;

        return $this;
    }

    public function getFont(): ?string
    {
        return $this->font;
    }

    public function setFont(string $font): static
    {
        $this->font = $font;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function getFontsize(): ?int
    {
        return $this->fontsize;
    }

    public function setFontsize(?int $fontsize): static
    {
        $this->fontsize = $fontsize;

        return $this;
    }

    public function isIsBold(): ?bool
    {
        return $this->isBold;
    }

    public function setIsBold(?bool $isBold): static
    {
        $this->isBold = $isBold;

        return $this;
    }

    public function isIsItalic(): ?bool
    {
        return $this->isItalic;
    }

    public function setIsItalic(?bool $isItalic): static
    {
        $this->isItalic = $isItalic;

        return $this;
    }

    public function isIsUnderline(): ?bool
    {
        return $this->isUnderline;
    }

    public function setIsUnderline(?bool $isUnderline): static
    {
        $this->isUnderline = $isUnderline;

        return $this;
    }

    public function getAlign(): ?string
    {
        return $this->align;
    }

    public function setAlign(?string $align): static
    {
        $this->align = $align;

        return $this;
    }   

    public function getCardOpacity(): ?float
    {
        return $this->cardOpacity;
    }

    public function setCardOpacity(?float $cardOpacity): static
    {
        $this->cardOpacity = $cardOpacity;

        return $this;
    }

    public function getCardBackgroundColor(): ?string
    {
        return $this->cardBackgroundColor;
    }

    public function setCardBackgroundColor(?string $cardBackgroundColor): static
    {
        $this->cardBackgroundColor = $cardBackgroundColor;

        return $this;
    }

    public function getCardBorderColor(): ?string
    {
        return $this->cardBorderColor;
    }

    public function setCardBorderColor(?string $cardBorderColor): static
    {
        $this->cardBorderColor = $cardBorderColor;

        return $this;
    }

    public function getCardBorderSize(): ?string
    {
        return $this->cardBorderSize;
    }

    public function setCardBorderSize(?string $cardBorderSize): static
    {
        $this->cardBorderSize = $cardBorderSize;

        return $this;
    }

    public function getCardRiduis(): ?string
    {
        return $this->cardRiduis;
    }

    public function setcardRiduis(string $cardRiduis): self
    {
        // Vérification que le statut est valide
        if (!in_array($cardRiduis, [RadiusLevel::xs,RadiusLevel::sm,RadiusLevel::md,RadiusLevel::lg,RadiusLevel::xl,])) {
            throw new \InvalidArgumentException("Invalid riduis");
        }
    $this->cardRiduis = $cardRiduis;

        return $this;
    }


    public function getButtonBackgroundColor(): ?string
    {
        return $this->buttonBackgroundColor;
    }

    public function setButtonBackgroundColor(?string $buttonBackgroundColor): static
    {
        $this->buttonBackgroundColor = $buttonBackgroundColor;

        return $this;
    }

    public function getButtonBorderColor(): ?string
    {
        return $this->buttonBorderColor;
    }

    public function setButtonBorderColor(?string $buttonBorderColor): static
    {
        $this->buttonBorderColor = $buttonBorderColor;

        return $this;
    }

    public function getButtonStyle(): ?string
    {
        return $this->buttonStyle;
    }

    public function setbuttonStyle(string $buttonStyle): self
    {
        // Vérification que le statut est valide
        if (!in_array($buttonStyle, [StyleButton::filled,StyleButton::light,StyleButton::outline])) {
            throw new \InvalidArgumentException("Invalid style");
        }
    $this->buttonStyle = $buttonStyle;

        return $this;
    }

    public function getButtonRiduis(): ?string
    {
        return $this->buttonRiduis;
    }

    public function setbuttonRiduis(string $buttonRiduis): self
    {
        // Vérification que le statut est valide
        if (!in_array($buttonRiduis, [RadiusLevel::xs,RadiusLevel::sm,RadiusLevel::md,RadiusLevel::lg,RadiusLevel::xl,])) {
            throw new \InvalidArgumentException("Invalid riduis");
        }
    $this->buttonRiduis = $buttonRiduis;

        return $this;
    }

  


}
