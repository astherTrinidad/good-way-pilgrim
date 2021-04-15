<?php

namespace App\Repository;

use App\Entity\Usuario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Usuario|null find($id, $lockMode = null, $lockVersion = null)
 * @method Usuario|null findOneBy(array $criteria, array $orderBy = null)
 * @method Usuario[]    findAll()
 * @method Usuario[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsuarioRepository extends ServiceEntityRepository {

    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, Usuario::class);
    }

    public function getOneByEmail($email) {

        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('u')->from(Usuario::class, 'u')->where('u.email = :email')->setParameter('email', $email);
        $user = $qb->getQuery()->getResult();
        if ($user == null) {
            return false;
        }
        return $user[0];

//        $em = $this->getEntityManager();
//        $db = $em->getConnection();
// 
//        $query = "SELECT * FROM usuario where email = '$email' ";
//        $resultado = $db->executeQuery($query);
//        $po=$resultado->fetchAll();
// 
//        // Mostrar todo
//        foreach ($po as $p) {
//            echo $p["nombre"];
//            echo "<br/>";
//            echo $p["apellido"];
//            echo "<hr/>";
//        }
    }

    public function getOneById($id) {

        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('u')->from(Usuario::class, 'u')->where('u.id = :id')->setParameter('id', $id);
        $user = $qb->getQuery()->getResult();
        if ($user == null) {
            return false;
        }
        return $user[0];
    }

    public function deleteOneById($id) {

        $em = $this->getEntityManager();
        $db = $em->getConnection();
        $query = "DELETE FROM usuario where id = $id ";
        $db->executeQuery($query);
    }

    function updateOneById($id, $user) {

        $em = $this->getEntityManager();
        $db = $em->getConnection();

        $picture = $user->getPicture();
        $name = $user->getName();
        $surname = $user->getSurname();
        $password = $user->getPassword();


        if (isset($picture)) {
            $query = "UPDATE usuario SET name='$name', surname='$surname', pass='$password', picture='$picture' where id = $id ";
        } else {
            $query = "UPDATE usuario SET name='$name', surname='$surname', pass='$password' where id = $id ";
        }
        $db->executeQuery($query);

        //$this->getOneById($id);
    }

    // /**
    //  * @return Usuario[] Returns an array of Usuario objects
    //  */
    /*
      public function findByExampleField($value)
      {
      return $this->createQueryBuilder('u')
      ->andWhere('u.exampleField = :val')
      ->setParameter('val', $value)
      ->orderBy('u.id', 'ASC')
      ->setMaxResults(10)
      ->getQuery()
      ->getResult()
      ;
      }

      public function findOneBySomeField($value): ?Usuario
      {
      return $this->createQueryBuilder('u')
      ->andWhere('u.exampleField = :val')
      ->setParameter('val', $value)
      ->getQuery()
      ->getOneOrNullResult()
      ;
      }
     */
}
