<?php

namespace App\Entity;

use App\Repository\ContactAgrometalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactAgrometalRepository::class)]
class ContactAgrometal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 1000)]
    private ?string $adress = null;

    #[ORM\Column]
    private ?string $telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $adress_title = null;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): static
    {
        $this->adress = $adress;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getAdressTitle(): ?string
    {
        return $this->adress_title;
    }

    public function setAdressTitle(string $adress_title): static
    {
        $this->adress_title = $adress_title;

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
