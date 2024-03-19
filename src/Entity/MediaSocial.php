<?php

namespace App\Entity;

use App\Repository\MediaSocialRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediaSocialRepository::class)]
class MediaSocial
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $link = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column]
    private ?bool $active = null;

    #[ORM\ManyToOne(targetEntity: ContactAgrometal::class)]
    #[ORM\JoinColumn(name: 'contact_id', referencedColumnName: 'id')]
    private ?ContactAgrometal $contact = null;

    #[ORM\ManyToOne(targetEntity: Entreprise::class)]
    #[ORM\JoinColumn(name: 'entreprise_id', referencedColumnName: 'id')]
    private ?Entreprise $entreprise = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): static
    {
        $this->link = $link;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

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

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): static
    {
        $this->active = $active;

        return $this;
    }

    public function getEntreprise(): ?Entreprise
    {
        return $this->entreprise;
    }

    public function setEntreprise(?Entreprise $entreprise): static
    {
        $this->entreprise = $entreprise;

        return $this;

    }

    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    public function setContact(?ContactAgrometal $contact): static
    {
        $this->contact = $contact;

        return $this;
    }
}
