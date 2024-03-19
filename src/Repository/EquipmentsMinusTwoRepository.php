<?php

namespace App\Repository;

use App\Entity\EquipmentsMinusTwo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EquipmentsMinusTwo>
 *
 * @method EquipmentsMinusTwo|null find($id, $lockMode = null, $lockVersion = null)
 * @method EquipmentsMinusTwo|null findOneBy(array $criteria, array $orderBy = null)
 * @method EquipmentsMinusTwo[]    findAll()
 * @method EquipmentsMinusTwo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipmentsMinusTwoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EquipmentsMinusTwo::class);
    }

    //    /**
    //     * @return EquipmentsMinusTwo[] Returns an array of EquipmentsMinusTwo objects
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

    //    public function findOneBySomeField($value): ?EquipmentsMinusTwo
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
