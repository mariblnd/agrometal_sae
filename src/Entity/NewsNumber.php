<?php

namespace App\Entity;

use App\Repository\NewsNumberRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NewsNumberRepository::class)]
class NewsNumber
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title_number = null;

    #[ORM\Column]
    private ?bool $active = null;

    #[ORM\Column]
    private ?float $number = null;

    #[ORM\ManyToOne(targetEntity: News::class)]
    #[ORM\JoinColumn(name: 'news_id', referencedColumnName: "id")]
    private $news;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleNumber(): ?string
    {
        return $this->title_number;
    }

    public function setTitleNumber(string $title_number): static
    {
        $this->title_number = $title_number;

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

    public function getNumber(): ?float
    {
        return $this->number;
    }

    public function setNumber(float $number): static
    {
        $this->number = $number;

        return $this;
    }

    public function getNews(): ?News
    {
        return $this->news;
    }

    public function setNews(?News $news): self
    {
        $this->news = $news;

        return $this;
    }
}
