<?php

namespace App\Repository;

use App\Entity\UsuarioCamino;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UsuarioCamino|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsuarioCamino|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsuarioCamino[]    findAll()
 * @method UsuarioCamino[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsuarioCaminoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsuarioCamino::class);
    }

    public function getAllById($id)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('u')
            ->from(UsuarioCamino::class, 'u')
            ->where('u.id = :id')
            ->setParameter('id', $id);

        $result = $qb->getQuery()->getResult();
        $usersPathResult = $result->fetchAllNumeric();
        $usersPaths = [];

        foreach ($usersPathResult as $userPath) {
            array_push($usersPaths, $userPath);
        }
        return $usersPaths;
    }

    public function getActivePath($id)
    {
        $em = $this->getEntityManager();
        $db = $em->getConnection();

        $query = "SELECT * FROM usuario_camino WHERE id_usuario = $id AND status = 'Active'";
        $result = $db->executeQuery($query);

        return $result;
    }
}
