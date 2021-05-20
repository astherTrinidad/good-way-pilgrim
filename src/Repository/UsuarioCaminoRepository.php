<?php

namespace App\Repository;

use App\Entity\UsuarioCamino;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method UsuarioCamino|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsuarioCamino|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsuarioCamino[]    findAll()
 * @method UsuarioCamino[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsuarioCaminoRepository extends ServiceEntityRepository {

    private $em;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $em) {
        parent::__construct($registry, UsuarioCamino::class);
        $this->em = $em;
    }

    public function getHistory($idUser) {
        $db = $this->em->getConnection();
        $query = "select c.id, c.name, uc.status, uc.start_date, uc.finish_date, count(uce.id)as etapas
        from usuario_camino uc, camino c, camino_etapa ce, usuario_camino_etapa uce 
        where uc.id_camino = c.id and c.id = ce.id_camino and ce.id = uce.id_caminoEtapa and uc.id_usuario = uce.id_usuario
        and uc.id_usuario =$idUser and uc.status != 'Active' group by uc.id";
        $result = $db->executeQuery($query);
        $usersPaths = $result->fetchAll();

        return $usersPaths;
    }

    public function getActivePath($idUser) {
        $db = $this->em->getConnection();
        $query = "SELECT c.* FROM camino c, usuario_camino uc WHERE uc.id_camino = c.id and id_usuario = $idUser AND status = 'Active'";        $result = $db->executeQuery($query);
        $usersPathsActive = $result->fetchAll();
        if(count($usersPathsActive)==0){
            return null;
        }
        return $usersPathsActive[0];
    }
    
    public function addActivePath($idUser, $idCamino, $date) {
        $db = $this->em->getConnection();
        $query = "INSERT INTO usuario_camino(id_usuario, id_camino, start_date, finish_date, status) values($idUser, $idCamino, \"$date\",null, \"Active\")";
        $db->executeQuery($query);
    }
    
    public function archivePath($idUser, $idCamino) {
        $db = $this->em->getConnection();
        $query = "UPDATE usuario_camino set status = 'Archived' where id_usuario = $idUser and id_camino = $idCamino";
        $db->executeQuery($query);
    }
    
    public function finishPath($idUser, $idCamino, $date) {
        $db = $this->em->getConnection();
        $query = "UPDATE usuario_camino set status = 'Completed', finish_date = \"$date\" where id_usuario = $idUser and id_camino = $idCamino";
        $db->executeQuery($query);
    }
    
    public function reactivatePath($idUser, $idCamino) {
        $db = $this->em->getConnection();
        $query = "UPDATE usuario_camino set status = 'Active' where id_usuario = $idUser and id_camino = $idCamino";
        $db->executeQuery($query);
    }

    public function getKm($idUser) {
        $db = $this->em->getConnection();
        $query = "SELECT IFNULL(sum(e2.km),0) as km FROM etapa e2 , usuario_camino_etapa uce, camino_etapa ce 
        WHERE uce.id_usuario =$idUser AND uce.id_caminoEtapa = ce.id AND ce.id_etapa = e2.id ;";
        $result = $db->executeQuery($query);
        $usersPathsActive = $result->fetchAll();
        return implode($usersPathsActive[0]);
    }
}
