<?php

namespace App\DataFixtures;

use App\Entity\UsuarioCaminoEtapa;
use App\DataFixtures\UserDataFixtures;
use App\DataFixtures\CaminoEtapaDataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class UsuarioCaminoEtapaDataFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        //Irene
        $usuarioCaminoEtapa = new UsuarioCaminoEtapa();
        $usuarioCaminoEtapa->setStatus("");
        $usuarioCaminoEtapa->setUser($this->getReference(UserDataFixtures::USUARIO . 2));
        $usuarioCaminoEtapa->setCaminoEtapa($this->getReference(CaminoDataFixtures::CAMINO . 1));
        $manager->persist($usuarioCaminoEtapa);
        $manager->flush();

        //Javi        
        $usuarioCaminoEtapa1 = new UsuarioCaminoEtapa();
        $usuarioCaminoEtapa1->setStatus("");
        $usuarioCaminoEtapa1->setUser($this->getReference(UserDataFixtures::USUARIO . 2));
        $usuarioCaminoEtapa1->setCaminoEtapa($this->getReference(CaminoDataFixtures::CAMINO . 1));
        $manager->persist($usuarioCaminoEtapa1);
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CaminoEtapaDataFixtures::class,
            UserDataFixtures::class
        ];
    }
}
