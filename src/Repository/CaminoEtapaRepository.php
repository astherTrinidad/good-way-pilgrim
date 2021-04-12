<?php

namespace App\Repository;

use App\Entity\CaminoEtapa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CaminoEtapa|null find($id, $lockMode = null, $lockVersion = null)
 * @method CaminoEtapa|null findOneBy(array $criteria, array $orderBy = null)
 * @method CaminoEtapa[]    findAll()
 * @method CaminoEtapa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CaminoEtapaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CaminoEtapa::class);
    }

    // /**
    //  * @return CaminoEtapa[] Returns an array of CaminoEtapa objects
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
    public function findOneBySomeField($value): ?CaminoEtapa
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
