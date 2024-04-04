<?php

namespace App\Entity;

use App\Repository\EntrepriseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntrepriseRepository::class)]
class Entreprise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $logo = null;

    #[ORM\Column(length: 255)]
    private ?string $file = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $website = null;

    #[ORM\Column(length: 750)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $company_name = null;

    #[ORM\Column(length: 255)]
    private ?string $partner_from = null;

    #[ORM\Column(length: 255)]
    private ?string $creation_date = null;

    #[ORM\Column(length: 255)]
    private ?string $region = null;

    #[ORM\Column]
    private ?int $margin_top = null;

    #[ORM\Column]
    private ?int $margin_left = null;

    #[ORM\Column(type: 'boolean')]
    private ?bool $instagramActive = false;
    
    #[ORM\Column(type: 'string', length: 255)]
    private ?string $instagram = null;
    
    #[ORM\Column(type: 'boolean')]
    private ?bool $linkedinActive = false;
    
    #[ORM\Column(type: 'string', length: 255)]
    private ?string $linkedin = null;
    
    #[ORM\Column(type: 'boolean')]
    private ?bool $facebookActive = false;
    
    #[ORM\Column(type: 'string', length: 255)]
    private ?string $facebook = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): static
    {
        $this->logo = $logo;

        return $this;
    }

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(string $file): static
    {
        $this->file = $file;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(string $website): static
    {
        $this->website = $website;

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

    public function getCompanyName(): ?string
    {
        return $this->company_name;
    }

    public function setCompanyName(string $company_name): static
    {
        $this->company_name = $company_name;

        return $this;
    }

    public function getPartnerFrom(): ?string
    {
        return $this->partner_from;
    }

    public function setPartnerFrom(string $partner_from): static
    {
        $this->partner_from = $partner_from;

        return $this;
    }

    public function getCreationDate(): ?string
    {
        return $this->creation_date;
    }

    public function setCreationDate(string $creation_date): static
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): static
    {
        $this->region = $region;

        return $this;
    }

    public function getMarginTop(): ?int
    {
        return $this->margin_top;
    }

    public function setMarginTop(int $margin_top): static
    {
        $this->margin_top = $margin_top;

        return $this;
    }

    public function getMarginLeft(): ?int
    {
        return $this->margin_left;
    }

    public function setMarginLeft(int $margin_left): static
    {
        $this->margin_left = $margin_left;

        return $this;
    }

    public function getInstagramActive(): ?bool
{
    return $this->instagramActive;
}

public function getInstagram(): ?string
{
    return $this->instagram;
}

public function getLinkedinActive(): ?bool
{
    return $this->linkedinActive;
}

public function getLinkedin(): ?string
{
    return $this->linkedin;
}

public function getFacebookActive(): ?bool
{
    return $this->facebookActive;
}

public function getFacebook(): ?string
{
    return $this->facebook;
}

// Setters
public function setInstagramActive(?bool $instagramActive): self
{
    $this->instagramActive = $instagramActive;

    return $this;
}

public function setInstagram(?string $instagram): self
{
    $this->instagram = $instagram;

    return $this;
}

public function setLinkedinActive(?bool $linkedinActive): self
{
    $this->linkedinActive = $linkedinActive;

    return $this;
}

public function setLinkedin(?string $linkedin): self
{
    $this->linkedin = $linkedin;

    return $this;
}

public function setFacebookActive(?bool $facebookActive): self
{
    $this->facebookActive = $facebookActive;

    return $this;
}

public function setFacebook(?string $facebook): self
{
    $this->facebook = $facebook;

    return $this;
}
}
