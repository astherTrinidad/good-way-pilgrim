<?php

namespace App\Repository;

use App\Entity\UsuarioCaminoEtapa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method UsuarioCaminoEtapa|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsuarioCaminoEtapa|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsuarioCaminoEtapa[]    findAll()
 * @method UsuarioCaminoEtapa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsuarioCaminoEtapaRepository extends ServiceEntityRepository {

     private $em;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $em) {
        parent::__construct($registry, UsuarioCaminoEtapa::class);
        $this->em = $em;
    }

    public function getEtapasRealizadas($idUser, $idCamino) {
        $db = $this->em->getConnection();
        $query = "select e.* from usuario_camino uc, usuario_camino_etapa uce, camino_etapa ce, etapa e 
        where uc.id_usuario = uce.id_usuario
        and uce.id_caminoEtapa = ce.id
        and ce.id_etapa = e.id 
        and uc.id_usuario = $idUser and uc.id_camino = $idCamino
        and uce.id_caminoEtapa = some(select id from camino_etapa ce where id_camino = $idCamino);";
        $result = $db->executeQuery($query);
        $etapasRealizadas = $result->fetchAll();
        return $etapasRealizadas;
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
