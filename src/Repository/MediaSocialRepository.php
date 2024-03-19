<?php

namespace App\Repository;

use App\Entity\MediaSocial;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MediaSocial>
 *
 * @method MediaSocial|null find($id, $lockMode = null, $lockVersion = null)
 * @method MediaSocial|null findOneBy(array $criteria, array $orderBy = null)
 * @method MediaSocial[]    findAll()
 * @method MediaSocial[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MediaSocialRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MediaSocial::class);
    }

    //    /**
    //     * @return MediaSocial[] Returns an array of MediaSocial objects
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

    //    public function findOneBySomeField($value): ?MediaSocial
    //    {
    //        return $this->createQueryBuilder('m')
    //            ->andWhere('m.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
