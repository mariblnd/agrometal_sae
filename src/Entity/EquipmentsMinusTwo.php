<?php

namespace App\Entity;

use App\Repository\EquipmentsMinusTwoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipmentsMinusTwoRepository::class)]
class EquipmentsMinusTwo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $value = null;

    #[ORM\ManyToOne(targetEntity: EquipmentsMinusOne::class)]
    #[ORM\JoinColumn(name: 'equipments_minus_one_id', referencedColumnName: "id")]
    private $equipments_minus_one;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): static
    {
        $this->value = $value;

        return $this;
    }

    public function getEquipmentsMinusOne(): ?EquipmentsMinusOne
    {
        return $this->equipments_minus_one;
    }

    public function setEquipmentsMinusOne(?EquipmentsMinusOne $equipments_minus_one): self
    {
        $this->equipments_minus_one = $equipments_minus_one;

        return $this;
    }
}
