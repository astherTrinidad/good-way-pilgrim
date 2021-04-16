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

    public function updateOneById($id, $user) {

        $em = $this->getEntityManager();
        $db = $em->getConnection();

        $picture = $user->getPicture();
        $name = $user->getName();
        $surname = $user->getSurname();
        $password = $user->getPassword();


        if (isset($picture)) {
            $query = "UPDATE usuario SET name='$name', surname='$surname', password='$password', picture='$picture' where id = $id ";
        } else {
            $query = "UPDATE usuario SET name='$name', surname='$surname', password='$password' where id = $id ";
        }
        $db->executeQuery($query);
    }

    public function getByString($string) {
        $em = $this->getEntityManager();
        $db = $em->getConnection();

        $query = "SELECT id, name, surname FROM usuario";
        $result = $db->executeQuery($query);
        $users = $result->fetchAll();
        $matchUsers = array();
        $stringFormatted = str_replace(" ", "", $this->stringPlainFormat(strtolower($string)));
        
        foreach ($users as $user) {
            $stringDB = $user["name"] . $user["surname"];
            $stringDBFormatted = str_replace(" ", "", $this->stringPlainFormat(strtolower($stringDB)));
            if (strcmp($stringDBFormatted, $stringFormatted) == 0
                    || $this->likeMatch('%'.$stringFormatted.'%',$stringDBFormatted)) {
                array_push($matchUsers, $user);
            }
        }
        return $matchUsers;
    }

    public function likeMatch($pattern, $subject) {
        $pattern = str_replace('%', '.*', preg_quote($pattern, '/'));
        return (bool) preg_match("/^{$pattern}$/i", $subject);
    }

    public function stringPlainFormat($string) {

        $string = str_replace(
                array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
                array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
                $string
        );

        $string = str_replace(
                array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
                array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
                $string);

        $string = str_replace(
                array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
                array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
                $string);

        $string = str_replace(
                array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
                array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
                $string);

        $string = str_replace(
                array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
                array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
                $string);

        $string = str_replace(
                array('ñ', 'Ñ', 'ç', 'Ç'),
                array('n', 'N', 'c', 'C'),
                $string
        );

        return $string;
    }

}
