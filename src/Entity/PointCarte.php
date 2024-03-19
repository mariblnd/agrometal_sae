<?php

namespace App\Entity;

use App\Repository\PointCarteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PointCarteRepository::class)]
class PointCarte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $region = null;

    #[ORM\Column]
    private ?int $margin_top = null;

    #[ORM\Column]
    private ?int $margin_left = null;

    #[ORM\ManyToOne(targetEntity: Entreprise::class)]
    #[ORM\JoinColumn(name: 'entreprise_id', referencedColumnName: 'id')]
    private ?Entreprise $entreprise = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getEntreprise(): ?Entreprise
    {
        return $this->entreprise;
    }

    public function setEntreprise(?Entreprise $entreprise): static
    {
        $this->entreprise = $entreprise;

        return $this;
    }
}
