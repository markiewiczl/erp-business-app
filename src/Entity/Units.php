<?php

namespace App\Entity;

use App\Repository\UnitsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnitsRepository::class)]
class Units
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 45)]
    private ?string $unitName = null;

    #[ORM\OneToMany(mappedBy: 'unit', targetEntity: FileCatalogue::class)]
    private Collection $fileCatalogues;

    public function __construct()
    {
        $this->fileCatalogues = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUnitName(): ?string
    {
        return $this->unitName;
    }

    public function setUnitName(string $unitName): self
    {
        $this->unitName = $unitName;

        return $this;
    }

    /**
     * @return Collection<int, FileCatalogue>
     */
    public function getFileCatalogues(): Collection
    {
        return $this->fileCatalogues;
    }

    public function addFileCatalogue(FileCatalogue $fileCatalogue): self
    {
        if (!$this->fileCatalogues->contains($fileCatalogue)) {
            $this->fileCatalogues->add($fileCatalogue);
            $fileCatalogue->setUnit($this);
        }

        return $this;
    }

    public function removeFileCatalogue(FileCatalogue $fileCatalogue): self
    {
        if ($this->fileCatalogues->removeElement($fileCatalogue)) {
            // set the owning side to null (unless already changed)
            if ($fileCatalogue->getUnit() === $this) {
                $fileCatalogue->setUnit(null);
            }
        }

        return $this;
    }
}
