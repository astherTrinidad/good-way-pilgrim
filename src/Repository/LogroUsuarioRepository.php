<?php

namespace App\Repository;

use App\Entity\LogroUsuario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

class LogroUsuarioRepository extends ServiceEntityRepository {
    
    private $em;
    
    public function __construct(ManagerRegistry $registry, EntityManagerInterface $em) {
        parent::__construct($registry, LogroUsuario::class);        
        $this->em = $em;
    }

    public function getById($id) {
        $db = $this->em->getConnection();
        $query = "SELECT * FROM logro_usuario where id_usuario = $id";
        $result = $db->executeQuery($query);
        $logrosResult = $result->fetchAll();
        return $logrosResult;
    }

    public function getThreeById($id) {
        $db = $this->em->getConnection();
        $query = "SELECT l.name, l.description, l.slug FROM logro l, logro_usuario lu WHERE l.id=lu.id_logro and lu.id_usuario = 169 ORDER BY date DESC LIMIT 3";
        $result = $db->executeQuery($query);
        $achievement = $result->fetchAll();
        return $achievement;
    }
    
    public function addAchievement($logroId, $userId, $date){
        $db = $this->em->getConnection();
        $query = "INSERT INTO logro_usuario (id_logro, id_usuario, date) VALUES($logroId, $userId, '$date')";
        return $db->executeQuery($query);
    }
    
    public function deleteAchievement($userId, $logroId){
        $db = $this->em->getConnection();
        $query = "DELETE FROM logro_usuario WHERE id_usuario = $userId AND id_logro= $logroId";
        return $db->executeQuery($query);
    }
    
    public function deleteAchievements($userId){        
        $db = $this->em->getConnection();
        $query = "DELETE FROM logro_usuario WHERE id_usuario = $userId";
        return $db->executeQuery($query);
    }
    
    public function check($logroId,$userId){        
        $db = $this->em->getConnection();        
        $query = "SELECT * FROM logro_usuario where id_usuario = $userId && id_logro=$logroId";
        $result = $db->executeQuery($query);
        $achievement = $result->fetchAll();
        if(count($achievement)!=0){
            return true;
        }
        return false;
    }


}
