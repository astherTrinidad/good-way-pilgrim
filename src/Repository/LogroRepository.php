<?php

namespace App\Repository;

use App\Entity\Logro;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\LogroUsuario;

/**
 * @method Logro|null find($id, $lockMode = null, $lockVersion = null)
 * @method Logro|null findOneBy(array $criteria, array $orderBy = null)
 * @method Logro[]    findAll()
 * @method Logro[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LogroRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Logro::class);
    }
    
    public function getAll()
    {
        $em = $this->getEntityManager();
        $db = $em->getConnection();
        $query = "SELECT * FROM logro";
        $result = $db->executeQuery($query);
        $achievement = $result->fetchAll();

        return $achievement;
    }
    
    
}
