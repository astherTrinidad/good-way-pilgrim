<?php

namespace App\Repository;

use App\Entity\Logro;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Logro|null find($id, $lockMode = null, $lockVersion = null)
 * @method Logro|null findOneBy(array $criteria, array $orderBy = null)
 * @method Logro[]    findAll()
 * @method Logro[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LogroRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Logro::class);
    }

    // /**
    //  * @return Logro[] Returns an array of Logro objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Logro
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
