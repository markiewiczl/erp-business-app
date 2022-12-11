<?php

namespace App\Entity;

use App\Repository\FileCatalogueRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FileCatalogueRepository::class)]
class FileCatalogue
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 45)]
    private ?string $fileName = null;

    #[ORM\Column(length: 45)]
    private ?string $fileCatalogueIndex = null;

    #[ORM\Column]
    private ?int $fileQuantity = null;

    #[ORM\Column]
    private ?float $fileNetPrice = null;

    #[ORM\ManyToOne(inversedBy: 'fileCatalogues')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Units $unit = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    public function setFileName(string $fileName): self
    {
        $this->fileName = $fileName;

        return $this;
    }

    public function getFileCatalogueIndex(): ?string
    {
        return $this->fileCatalogueIndex;
    }

    public function setFileCatalogueIndex(string $fileCatalogueIndex): self
    {
        $this->fileCatalogueIndex = $fileCatalogueIndex;

        return $this;
    }

    public function getFileQuantity(): ?int
    {
        return $this->fileQuantity;
    }

    public function setFileQuantity(int $fileQuantity): self
    {
        $this->fileQuantity = $fileQuantity;

        return $this;
    }

    public function getFileNetPrice(): ?float
    {
        return $this->fileNetPrice;
    }

    public function setFileNetPrice(float $fileNetPrice): self
    {
        $this->fileNetPrice = $fileNetPrice;

        return $this;
    }

    public function getUnit(): ?Units
    {
        return $this->unit;
    }

    public function setUnit(?Units $unit): self
    {
        $this->unit = $unit;

        return $this;
    }
}
