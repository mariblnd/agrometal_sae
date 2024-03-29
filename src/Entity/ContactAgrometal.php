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

    #[ORM\ManyToOne(targetEntity: MediaSocial::class)]
    #[ORM\JoinColumn(name: 'socialmedia', referencedColumnName: 'id')]
    private ?MediaSocial $socialmedia = null;


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

    public function getSocialMedia(): ?MediaSocial
    {
        return $this->socialmedia;
    }

    public function setSocialMedia(?MediaSocial $socialmedia): static
    {
        $this->socialmedia = $socialmedia;

        return $this;

    }
}
