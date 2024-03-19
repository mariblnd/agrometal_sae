<?php

namespace App\Repository;

use App\Entity\NewsNumber;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NewsNumber>
 *
 * @method NewsNumber|null find($id, $lockMode = null, $lockVersion = null)
 * @method NewsNumber|null findOneBy(array $criteria, array $orderBy = null)
 * @method NewsNumber[]    findAll()
 * @method NewsNumber[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NewsNumberRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NewsNumber::class);
    }

    //    /**
    //     * @return NewsNumber[] Returns an array of NewsNumber objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('n')
    //            ->andWhere('n.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('n.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?NewsNumber
    //    {
    //        return $this->createQueryBuilder('n')
    //            ->andWhere('n.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
