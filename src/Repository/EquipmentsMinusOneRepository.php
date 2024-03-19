<?php

namespace App\Repository;

use App\Entity\EquipmentsMinusOne;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EquipmentsMinusOne>
 *
 * @method EquipmentsMinusOne|null find($id, $lockMode = null, $lockVersion = null)
 * @method EquipmentsMinusOne|null findOneBy(array $criteria, array $orderBy = null)
 * @method EquipmentsMinusOne[]    findAll()
 * @method EquipmentsMinusOne[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipmentsMinusOneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EquipmentsMinusOne::class);
    }

    //    /**
    //     * @return EquipmentsMinusOne[] Returns an array of EquipmentsMinusOne objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('e.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?EquipmentsMinusOne
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
