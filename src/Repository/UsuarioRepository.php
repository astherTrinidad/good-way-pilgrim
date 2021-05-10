<?php

namespace App\Repository;

use App\Entity\Usuario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method Usuario|null find($id, $lockMode = null, $lockVersion = null)
 * @method Usuario|null findOneBy(array $criteria, array $orderBy = null)
 * @method Usuario[]    findAll()
 * @method Usuario[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsuarioRepository extends ServiceEntityRepository
{

    private $em;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $em)
    {
        parent::__construct($registry, Usuario::class);
        $this->em = $em;
    }

    public function getOneByEmail($email)
    {

        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('u')->from(Usuario::class, 'u')->where('u.email = :email')->setParameter('email', $email);
        $user = $qb->getQuery()->getResult();
        if ($user == null) {
            return false;
        }
        return $user[0];
    }

    public function getOneById($id)
    {

        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('u')->from(Usuario::class, 'u')->where('u.id = :id')->setParameter('id', $id);
        $user = $qb->getQuery()->getResult();
        if ($user == null) {
            return false;
        }
        return $user[0];
    }

    public function deleteOneById($id)
    {

        $db = $this->em->getConnection();
        $query = "DELETE FROM usuario where id = $id ";
        $db->executeQuery($query);
    }

    public function updateOneById($id, $user)
    {

        $db = $this->em->getConnection();

        $picture = $user->getPicture();
        $name = $user->getName();
        $surname = $user->getSurname();
        $password = $user->getPassword();

        if (isset($picture) && isset($password)) {
            $query = "UPDATE usuario SET name='$name', surname='$surname', password='$password', picture='$picture' where id = $id ";
        } else if (!isset($picture) && isset($password)) {
            $query = "UPDATE usuario SET name='$name', surname='$surname', password='$password' where id = $id ";
        } else if (isset($picture) && !isset($password)) {
            $query = "UPDATE usuario SET name='$name', surname='$surname', picture='$picture' where id = $id ";
        } else {
            $query = "UPDATE usuario SET name='$name', surname='$surname' where id = $id ";
        }
        $db->executeQuery($query);
        $this->em->clear();

        return $this->getOneById($id);
    }
}
