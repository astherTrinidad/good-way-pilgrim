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
class MochilaRepository extends ServiceEntityRepository
{
    private $em;
    
    public function __construct(ManagerRegistry $registry, EntityManagerInterface $em) {
        parent::__construct($registry, Mochila::class);        
        $this->em = $em;
    }

    public function getMyBackpacks($idUser){
        $db = $this->em->getConnection();
        $query = "SELECT c.id, c.name, sum(quantity) as numObjects FROM mochila m, camino c where m.id_camino = c.id and id_usuario = $idUser group by c.id, c.name";
        $result = $db->executeQuery($query);
        $logrosResult = $result->fetchAll();
        return $logrosResult;        
    }
    
    public function getInfoBackpack($idUser, $idCamino){
        $db = $this->em->getConnection();
        $query = "select `object` , quantity from mochila m where id_usuario = $idUser and id_camino = $idCamino";
        $result = $db->executeQuery($query);
        $logrosResult = $result->fetchAll();
        return $logrosResult;        
    }
    
    public function mochilaExists($idUser, $idCamino) {
        $db = $this->em->getConnection();
        $query = "SELECT * FROM mochila uc WHERE id_usuario = $idUser and id_camino=$idCamino";
        $result = $db->executeQuery($query);
        $usersPathsActive = $result->fetchAll();
        if(count($usersPathsActive)==0){
            return false;
        }
        return true;
    }
    
    public function deleteBackpack($idUser, $idCamino){        
        $db = $this->em->getConnection();
        $query = "DELETE FROM mochila WHERE id_usuario = $idUser AND id_camino= $idCamino";
        return $db->executeQuery($query);
    }
}
