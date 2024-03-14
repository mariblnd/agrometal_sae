<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 2000)]
    private ?string $message = null;

    #[ORM\Column(length: 255)]
    private ?string $mail = null;

    #[ORM\Column]
    private ?int $tel = null;

    #[ORM\Column]
    private ?bool $brasserie_exist = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $brasserie_name = null;

    #[ORM\Column(length: 2000, nullable: true)]
    private ?string $project = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): static
    {
        $this->mail = $mail;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(int $tel): static
    {
        $this->tel = $tel;

        return $this;
    }

    public function isBrasserieExist(): ?bool
    {
        return $this->brasserie_exist;
    }

    public function setBrasserieExist(bool $brasserie_exist): static
    {
        $this->brasserie_exist = $brasserie_exist;

        return $this;
    }

    public function getBrasserieName(): ?string
    {
        return $this->brasserie_name;
    }

    public function setBrasserieName(?string $brasserie_name): static
    {
        $this->brasserie_name = $brasserie_name;

        return $this;
    }

    public function getProject(): ?string
    {
        return $this->project;
    }

    public function setProject(?string $project): static
    {
        $this->project = $project;

        return $this;
    }
}
