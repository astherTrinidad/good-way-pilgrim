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
class UsuarioCaminoRepository extends ServiceEntityRepository
{
    private $em;
    
    public function __construct(ManagerRegistry $registry, EntityManagerInterface $em)
    {
        parent::__construct($registry, UsuarioCamino::class);        
        $this->em = $em;
    }

    public function getAllById($id)
    {
        $db = $this->em->getConnection();
        $query = "SELECT * FROM usuario_camino WHERE id_usuario = $id";
        $result = $db->executeQuery($query);
        $usersPaths = $result->fetchAll();

        return $usersPaths;
    }

    public function getActivePath($id)
    {
        $db = $this->em->getConnection();
        $query = "SELECT * FROM usuario_camino WHERE id_usuario = $id AND status = 'Active'";
        $result = $db->executeQuery($query);
        $usersPathsActive = $result->fetchAll();
        if(count($usersPathsActive) == 0){
            return null;
        }
        return $usersPathsActive[0];
    }
}
