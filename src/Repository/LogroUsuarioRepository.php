<?php

namespace App\Repository;

use App\Entity\LogroUsuario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LogroUsuario|null find($id, $lockMode = null, $lockVersion = null)
 * @method LogroUsuario|null findOneBy(array $criteria, array $orderBy = null)
 * @method LogroUsuario[]    findAll()
 * @method LogroUsuario[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LogroUsuarioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LogroUsuario::class);
    }

    // /**
    //  * @return LogroUsuario[] Returns an array of LogroUsuario objects
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
    public function findOneBySomeField($value): ?LogroUsuario
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
