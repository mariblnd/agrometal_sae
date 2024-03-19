<?php

namespace App\Repository;

use App\Entity\SocialMediaContact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SocialMediaContact>
 *
 * @method SocialMediaContact|null find($id, $lockMode = null, $lockVersion = null)
 * @method SocialMediaContact|null findOneBy(array $criteria, array $orderBy = null)
 * @method SocialMediaContact[]    findAll()
 * @method SocialMediaContact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SocialMediaContactRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SocialMediaContact::class);
    }

    //    /**
    //     * @return SocialMediaContact[] Returns an array of SocialMediaContact objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('s.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?SocialMediaContact
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
