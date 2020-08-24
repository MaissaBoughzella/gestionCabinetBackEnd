<?php

namespace App\Repository;

use App\Entity\Imageradio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Imageradio|null find($id, $lockMode = null, $lockVersion = null)
 * @method Imageradio|null findOneBy(array $criteria, array $orderBy = null)
 * @method Imageradio[]    findAll()
 * @method Imageradio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageradioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Imageradio::class);
    }
    public function findByCons($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.consultation = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult()
        ;
    }
    // /**
    //  * @return Imageradio[] Returns an array of Imageradio objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Imageradio
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
