<?php

namespace App\Repository;

use App\Entity\MapRegions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MapRegions>
 *
 * @method MapRegions|null find($id, $lockMode = null, $lockVersion = null)
 * @method MapRegions|null findOneBy(array $criteria, array $orderBy = null)
 * @method MapRegions[]    findAll()
 * @method MapRegions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MapRegionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MapRegions::class);
    }

    //    /**
    //     * @return MapRegions[] Returns an array of MapRegions objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('m')
    //            ->andWhere('m.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('m.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?MapRegions
    //    {
    //        return $this->createQueryBuilder('m')
    //            ->andWhere('m.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
