<?php

namespace App\DataFixtures;

use App\Entity\Units;
use App\Entity\User;
use App\Factory\FileCatalogueFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    private FileCatalogueFactory $fileCatalogueFactory;

    private UserFactory $userFactory;

    public function __construct(FileCatalogueFactory $fileCatalogueFactory, UserFactory $userFactory)
    {
        $this->fileCatalogueFactory = $fileCatalogueFactory;
        $this->userFactory = $userFactory;
    }

    public function load(ObjectManager $manager): void
    {
        $user = $this->userFactory->factoryMethod('luke@luke.pl', 'luke');

        $unit = new Units('set');

        $fileCatalogue = $this->fileCatalogueFactory->factoryMethod(
            'nazwa',
            'index w katalogu',
            14,
            3.2,
            $unit);

        $manager->persist($user);
        $manager->persist($unit);
        $manager->persist($fileCatalogue);

        $manager->flush();
    }
}
