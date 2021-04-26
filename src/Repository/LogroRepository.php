<?php

namespace App\Repository;

use App\Entity\Logro;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Logro|null find($id, $lockMode = null, $lockVersion = null)
 * @method Logro|null findOneBy(array $criteria, array $orderBy = null)
 * @method Logro[]    findAll()
 * @method Logro[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LogroRepository extends ServiceEntityRepository
{
    private $em;
    
    public function __construct(ManagerRegistry $registry, EntityManagerInterface $em)
    {
        parent::__construct($registry, Logro::class);        
        $this->em = $em;
    }
    
    public function getAll()
    {        
        $db = $this->em->getConnection();
        $query = "SELECT * FROM logro";
        $result = $db->executeQuery($query);
        $achievement = $result->fetchAll();

        return $achievement;
    }
    
    
}
