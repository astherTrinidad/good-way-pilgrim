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
        $query = "select c.id, c.name, uc.status, count(uce.id)as etapas
        from usuario_camino uc, camino c, camino_etapa ce, usuario_camino_etapa uce 
        where uc.id_camino = c.id and c.id = ce.id_camino and ce.id = uce.id_caminoEtapa and uc.id_usuario = uce.id_usuario
        and uc.id_usuario =$idUser and uc.status != 'Active' group by uc.id;";
        $result = $db->executeQuery($query);
        $usersPaths = $result->fetchAll();

        return $usersPaths;
    }

    public function getActivePath($idUser) {
        $db = $this->em->getConnection();
        $query = "SELECT c.* FROM camino c, usuario_camino uc WHERE id_usuario = $idUser AND status = 'Active'";
        $result = $db->executeQuery($query);
        $usersPathsActive = $result->fetchAll();
        return $usersPathsActive[0];
    }

    public function getEtapasRealizadas($idUser, $idCamino) {
        $db = $this->em->getConnection();
        $query = "select e.* from usuario_camino uc, usuario_camino_etapa uce, camino_etapa ce, etapa e 
        where uc.id_usuario = uce.id_usuario
        and uce.id_caminoEtapa = ce.id
        and ce.id_etapa = e.id 
        and uc.id_usuario = $idUser and uc.id_camino = $idCamino
        and uce.id_caminoEtapa = some(select id from camino_etapa ce where id_camino = $idCamino);";
        $result = $db->executeQuery($query);
        $etapasRealizadas = $result->fetchAll();
        return $etapasRealizadas;
    }

//    public function getKm($idUser) {
//        $db = $this->em->getConnection();
//        $query = "SELECT IFNULL(sum(e2.km),0) as km FROM etapa e2 , usuario_camino_etapa uce, camino_etapa ce 
//        WHERE uce.id_usuario =$idUser AND uce.id_caminoEtapa = ce.id AND ce.id_etapa = e2.id ;";
//        $result = $db->executeQuery($query);
//        $usersPathsActive = $result->fetchAll();
//        return implode($usersPathsActive[0]);
//    }
}
