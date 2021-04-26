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
        $logros = array();

        foreach ($logrosResult as $logro) {
            array_push($logros, $logro);
        }
        return $logros;
    }

    public function getThreeById($id) {
        $db = $this->em->getConnection();
        $query = "SELECT * FROM logro_usuario WHERE id_usuario = $id ORDER BY date DESC LIMIT 3";
        $result = $db->executeQuery($query);
        $achievement = $result->fetchAll();

        return $achievement;
    }
    
    public function addAchievement($id_logro, $id_user, $date){
        $db = $this->em->getConnection();
        $query = "INSERT INTO logro_usuario (id_logro, id_usuario, date) VALUES($id_logro, $id_user, '$date')";
        return $db->executeQuery($query);
    }
    
    public function deleteAchievement($id_logro, $id_user){        
        $db = $this->em->getConnection();
        $query = "DELETE FROM logro_usuario WHERE id_logro = $id_logro and id_usuario = $id_user";
        return $db->executeQuery($query);
    }

}
