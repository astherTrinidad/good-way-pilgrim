<?php

namespace App\Repository;

use App\Entity\Mochila;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method Mochila|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mochila|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mochila[]    findAll()
 * @method Mochila[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MochilaRepository extends ServiceEntityRepository {

    private $em;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $em) {
        parent::__construct($registry, Mochila::class);
        $this->em = $em;
    }

    public function getMyBackpacks($idUser) {
        $db = $this->em->getConnection();
        $query = "SELECT c.id, c.name, c.slug, sum(quantity) as numObjects FROM mochila m, camino c where m.id_camino = c.id and id_usuario = $idUser group by c.id, c.name";
        $result = $db->executeQuery($query);
        $mochilas = $result->fetchAll();
        return $mochilas;
    }

    public function getInfoBackpack($idUser, $idCamino) {
        $db = $this->em->getConnection();
        $query = "select id, `object` , quantity from mochila m where id_usuario = $idUser and id_camino = $idCamino";
        $result = $db->executeQuery($query);
        $mochila = $result->fetchAll();
        return $mochila;
    }

    public function mochilaExists($idUser, $idCamino) {
        $db = $this->em->getConnection();
        $query = "SELECT * FROM mochila uc WHERE id_usuario = $idUser and id_camino=$idCamino";
        $result = $db->executeQuery($query);
        $mochila = $result->fetchAll();
        if (count($mochila) == 0) {
            return false;
        }
        return true;
    }

    public function deleteBackpack($idUser, $idCamino) {
        $db = $this->em->getConnection();
        $query = "DELETE FROM mochila WHERE id_usuario = $idUser AND id_camino= $idCamino";
        return $db->executeQuery($query);
    }

    public function checkMaxItems($idUser, $idCamino) {
        $db = $this->em->getConnection();
        $query = "SELECT * FROM mochila uc WHERE id_usuario = $idUser and id_camino=$idCamino";
        $result = $db->executeQuery($query);
        $objects = $result->fetchAll();
        if (count($objects) > 39) {
            return true;
        }
        return false;
    }

    public function addItem($idUser, $idCamino, $object, $quantity) {
        $db = $this->em->getConnection();
        $query = "SELECT * FROM mochila uc WHERE id_usuario = $idUser and id_camino=$idCamino and object='$object'";
        $result = $db->executeQuery($query);
        $objectInBackpack = $result->fetchAll();
        if (count($objectInBackpack) > 0) {
            $query2 = "UPDATE mochila set quantity = quantity + $quantity WHERE id_usuario = $idUser and id_camino=$idCamino and object='$object'";
            return $db->executeQuery($query2);
        }
        $query2 = "INSERT INTO mochila (id_usuario, id_camino, object, quantity) VALUES($idUser, $idCamino, '$object', $quantity)";
        return $db->executeQuery($query2);
    }

    public function editItem($id, $object, $quantity) {
        $db = $this->em->getConnection();
        $query = "UPDATE mochila set object = '$object', quantity = $quantity WHERE id = $id";
        return $db->executeQuery($query);
    }

    public function deleteItem($id) {
        $db = $this->em->getConnection();
        $query = "DELETE FROM mochila WHERE id = $id";
        return $db->executeQuery($query);
    }

}
