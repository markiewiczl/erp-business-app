<?php

namespace App\Factory;

use App\Entity\FileCatalogue;
use App\Entity\Units;

class FileCatalogueFactory
{

    public function factoryMethod(
        ?string $fileName,
        ?string $fileCatalogueIndex,
        ?int $fileQuantity,
        ?float $fileNetPrice,
        ?Units $units): FileCatalogue
    {
        $fileCatalogue = new FileCatalogue();
        $fileCatalogue->setFileName($fileName);
        $fileCatalogue->setFileCatalogueIndex($fileCatalogueIndex);
        $fileCatalogue->setFileQuantity($fileQuantity);
        $fileCatalogue->setFileNetPrice($fileNetPrice);
        $fileCatalogue->setUnit($units);

        return $fileCatalogue;
    }
}