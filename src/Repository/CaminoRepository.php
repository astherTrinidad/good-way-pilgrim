<?php

namespace App\Repository;

use App\Entity\Camino;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method Camino|null find($id, $lockMode = null, $lockVersion = null)
 * @method Camino|null findOneBy(array $criteria, array $orderBy = null)
 * @method Camino[]    findAll()
 * @method Camino[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CaminoRepository extends ServiceEntityRepository {

    private $em;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $em) {
        parent::__construct($registry, Camino::class);
        $this->em = $em;
    }

    public function getAll() {
        $db = $this->em->getConnection();
        $query = "select c.id, c.name, c.num_etapas, c.description , c.start, c.finish, c.slug, round(sum(km), 1) as km from camino c, camino_etapa ce, etapa e
        where c.id = ce.id_camino and ce.id_etapa = e.id group by c.id ;";
        $result = $db->executeQuery($query);
        $caminos = $result->fetchAll();

        return $caminos;
    }
    
    public function getEtapas($idCamino) {
        $db = $this->em->getConnection();
        $query = "select e.* from camino_etapa ce , etapa e where ce.id_etapa = e.id and ce.id_camino = $idCamino;";
        $result = $db->executeQuery($query);
        $caminos = $result->fetchAll();

        return $caminos;
    }
    
     
    public function getkm($idCamino) {
        $db = $this->em->getConnection();
        $query = "SELECT IFNULL(sum(e.km),0) as km from camino_etapa ce, etapa e where ce.id_etapa = e.id and id_camino =$idCamino;";
        $result = $db->executeQuery($query);
        $km = $result->fetchAll();
        return $km[0];
    }

    // /**
    //  * @return Camino[] Returns an array of Camino objects
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
      public function findOneBySomeField($value): ?Camino
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
