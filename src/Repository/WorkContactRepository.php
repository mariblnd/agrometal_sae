<?php

namespace App\Repository;

use App\Entity\WorkContact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WorkContact>
 *
 * @method WorkContact|null find($id, $lockMode = null, $lockVersion = null)
 * @method WorkContact|null findOneBy(array $criteria, array $orderBy = null)
 * @method WorkContact[]    findAll()
 * @method WorkContact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WorkContactRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WorkContact::class);
    }

    //    /**
    //     * @return WorkContact[] Returns an array of WorkContact objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('w')
    //            ->andWhere('w.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('w.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?WorkContact
    //    {
    //        return $this->createQueryBuilder('w')
    //            ->andWhere('w.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
