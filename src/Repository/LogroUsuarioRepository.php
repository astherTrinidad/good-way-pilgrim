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
class LogroUsuarioRepository extends ServiceEntityRepository {

    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, LogroUsuario::class);
    }

    public function getById($id) {
        $em = $this->getEntityManager();
        $db = $em->getConnection();

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
        $em = $this->getEntityManager();
        $db = $em->getConnection();
        $query = "SELECT * FROM logro_usuario WHERE id_usuario = $id ORDER BY date DESC LIMIT 3";
        $result = $db->executeQuery($query);
        $achievement = $result->fetchAll();

        return $achievement;
    }
    
    public function addAchievement($id_logro, $id_user, $date){
        $em = $this->getEntityManager();
        $db = $em->getConnection();
        $query = "INSERT INTO logro_usuario (id_logro, id_usuario, date) VALUES($id_logro, $id_user, $date)";
        return $db->executeQuery($query);
    }
    
    public function deleteAchievement($id_logro, $id_user){
        
    }

}
