<?php

namespace App\Entity;

use App\Repository\WorkContactRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\ContactAgrometal;

#[ORM\Entity(repositoryClass: WorkContactRepository::class)]
class WorkContact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $mail = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $telephone = null;

    #[ORM\ManyToOne(targetEntity: ContactAgrometal::class)]
    #[ORM\JoinColumn(name: 'contact_id', referencedColumnName: 'id')]
    private ?ContactAgrometal $contact = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

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

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getContact(): ?ContactAgrometal
    {
        return $this->contact;
    }

    public function setContact(?ContactAgrometal $contact): static
    {
        $this->contact = $contact;

        return $this;
    }
}
