<?php

namespace App\Repository;

use App\Entity\UsuarioCaminoEtapa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UsuarioCaminoEtapa|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsuarioCaminoEtapa|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsuarioCaminoEtapa[]    findAll()
 * @method UsuarioCaminoEtapa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsuarioCaminoEtapaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsuarioCaminoEtapa::class);
    }

    // /**
    //  * @return UsuarioCaminoEtapa[] Returns an array of UsuarioCaminoEtapa objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UsuarioCaminoEtapa
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
