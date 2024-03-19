<?php

namespace App\Entity;

use App\Repository\EquipmentsMinusOneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipmentsMinusOneRepository::class)]
class EquipmentsMinusOne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $small_description = null;

    #[ORM\Column(length: 1000)]
    private ?string $big_description = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\ManyToOne(targetEntity: Equipments::class)]
    #[ORM\JoinColumn(name: 'equipments_id', referencedColumnName: "id")]
    private $equipments;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSmallDescription(): ?string
    {
        return $this->small_description;
    }

    public function setSmallDescription(string $small_description): static
    {
        $this->small_description = $small_description;

        return $this;
    }

    public function getBigDescription(): ?string
    {
        return $this->big_description;
    }

    public function setBigDescription(string $big_description): static
    {
        $this->big_description = $big_description;

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

    public function getEquipments(): ?Equipments
    {
        return $this->equipments;
    }

    public function setEquipments(?Equipments $equipments): self
    {
        $this->equipments = $equipments;

        return $this;
    }
}
