<?php

namespace App\Repository;

use App\Entity\ContactAgrometal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ContactAgrometal>
 *
 * @method ContactAgrometal|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContactAgrometal|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContactAgrometal[]    findAll()
 * @method ContactAgrometal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactAgrometalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContactAgrometal::class);
    }

    //    /**
    //     * @return ContactAgrometal[] Returns an array of ContactAgrometal objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?ContactAgrometal
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
