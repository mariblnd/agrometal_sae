<?php

namespace App\Entity;

use App\Repository\EquipmentsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipmentsRepository::class)]
class Equipments
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column]
    private ?bool $preview = null;

    #[ORM\Column(length: 1000)]
    private ?string $description_long = null;

    #[ORM\Column(length: 255)]
    private ?string $description_short = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function isPreview(): ?bool
    {
        return $this->preview;
    }

    public function setPreview(bool $preview): static
    {
        $this->preview = $preview;

        return $this;
    }

    public function getDescriptionLong(): ?string
    {
        return $this->description_long;
    }

    public function setDescriptionLong(string $description_long): static
    {
        $this->description_long = $description_long;

        return $this;
    }

    public function getDescriptionShort(): ?string
    {
        return $this->description_short;
    }

    public function setDescriptionShort(string $description_short): static
    {
        $this->description_short = $description_short;

        return $this;
    }
}
