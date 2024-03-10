<?php

namespace App\Entity;

use App\Repository\AgromeetalJSONRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AgromeetalJSONRepository::class)]
class AgromeetalJSON
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private array $json_file = [];

    #[ORM\Column(length: 255)]
    private ?string $json_file_name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJsonFile(): array
    {
        return $this->json_file;
    }

    public function setJsonFile(array $json_file): static
    {
        $this->json_file = $json_file;

        return $this;
    }

    public function getJsonFileName(): ?string
    {
        return $this->json_file_name;
    }

    public function setJsonFileName(string $json_file_name): static
    {
        $this->json_file_name = $json_file_name;

        return $this;
    }
}
