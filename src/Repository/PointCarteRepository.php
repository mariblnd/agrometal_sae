<?php

namespace App\Repository;

use App\Entity\PointCarte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PointCarte>
 *
 * @method PointCarte|null find($id, $lockMode = null, $lockVersion = null)
 * @method PointCarte|null findOneBy(array $criteria, array $orderBy = null)
 * @method PointCarte[]    findAll()
 * @method PointCarte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PointCarteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PointCarte::class);
    }

    //    /**
    //     * @return PointCarte[] Returns an array of PointCarte objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?PointCarte
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
