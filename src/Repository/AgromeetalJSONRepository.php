<?php

namespace App\Repository;

use App\Entity\AgromeetalJSON;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AgromeetalJSON>
 *
 * @method AgromeetalJSON|null find($id, $lockMode = null, $lockVersion = null)
 * @method AgromeetalJSON|null findOneBy(array $criteria, array $orderBy = null)
 * @method AgromeetalJSON[]    findAll()
 * @method AgromeetalJSON[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AgromeetalJSONRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AgromeetalJSON::class);
    }

    //    /**
    //     * @return AgromeetalJSON[] Returns an array of AgromeetalJSON objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('a.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?AgromeetalJSON
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
