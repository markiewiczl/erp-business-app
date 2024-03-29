<?php

namespace App\Repository;

use App\Entity\FileCatalogue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FileCatalogue>
 *
 * @method FileCatalogue|null find($id, $lockMode = null, $lockVersion = null)
 * @method FileCatalogue|null findOneBy(array $criteria, array $orderBy = null)
 * @method FileCatalogue[]    findAll()
 * @method FileCatalogue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FileCatalogueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FileCatalogue::class);
    }

    public function save(FileCatalogue $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(FileCatalogue $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function orderByColumn($order, $column): array
    {
        return $this->createQueryBuilder('a')
            ->orderBy('a.'. $column, $order)
            ->getQuery()
            ->getResult()
            ;
    }
}
