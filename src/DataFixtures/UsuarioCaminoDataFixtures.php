<?php

namespace App\DataFixtures;

use App\Entity\UsuarioCamino;
use App\DataFixtures\UserDataFixtures;
use App\DataFixtures\CaminoDataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class UsuarioCaminoDataFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        //patricia no tiene
        //Irene
        $usuarioCamino = new UsuarioCamino();
        $usuarioCamino->setStartDate("2021-04-17");
        $usuarioCamino->setFinishDate("");
        $usuarioCamino->setStatus("Active");
        $usuarioCamino->setUser($this->getReference(UserDataFixtures::USUARIO . 2));
        $usuarioCamino->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 1));
        $manager->persist($usuarioCamino);
        $manager->flush();

        $usuarioCamino1 = new UsuarioCamino();
        $usuarioCamino1->setStartDate("2015-06-01");
        $usuarioCamino1->setFinishDate("2015-06-20");
        $usuarioCamino1->setStatus("Completed");
        $usuarioCamino1->setUser($this->getReference(UserDataFixtures::USUARIO . 2));
        $usuarioCamino1->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 2));
        $manager->persist($usuarioCamino1);
        $manager->flush();

        //Asther
        $usuarioCamino2 = new UsuarioCamino();
        $usuarioCamino2->setStartDate("2019-04-01");
        $usuarioCamino2->setFinishDate("2019-06-02");
        $usuarioCamino2->setStatus("Completed");
        $usuarioCamino2->setUser($this->getReference(UserDataFixtures::USUARIO . 3));
        $usuarioCamino2->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 2));
        $manager->persist($usuarioCamino2);
        $manager->flush();

        //Sara
        $usuarioCamino3 = new UsuarioCamino();
        $usuarioCamino3->setStartDate("2018-02-23");
        $usuarioCamino3->setFinishDate("");
        $usuarioCamino3->setStatus("Active");
        $usuarioCamino3->setUser($this->getReference(UserDataFixtures::USUARIO . 4));
        $usuarioCamino3->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 1));
        $manager->persist($usuarioCamino3);
        $manager->flush();

        //Javi
        $usuarioCamino4 = new UsuarioCamino();
        $usuarioCamino4->setStartDate("2021-01-01");
        $usuarioCamino4->setFinishDate("2021-01-15");
        $usuarioCamino4->setStatus("Completed");
        $usuarioCamino4->setUser($this->getReference(UserDataFixtures::USUARIO . 5));
        $usuarioCamino4->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 1));
        $manager->persist($usuarioCamino4);
        $manager->flush();

        $usuarioCamino5 = new UsuarioCamino();
        $usuarioCamino5->setStartDate("2021-04-01");
        $usuarioCamino5->setFinishDate("");
        $usuarioCamino5->setStatus("Archived");
        $usuarioCamino5->setUser($this->getReference(UserDataFixtures::USUARIO . 5));
        $usuarioCamino5->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 2));
        $manager->persist($usuarioCamino5);
        $manager->flush();

        $usuarioCamino6 = new UsuarioCamino();
        $usuarioCamino6->setStartDate("2021-09-01");
        $usuarioCamino6->setFinishDate("");
        $usuarioCamino6->setStatus("Active");
        $usuarioCamino6->setUser($this->getReference(UserDataFixtures::USUARIO . 5));
        $usuarioCamino6->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 3));
        $manager->persist($usuarioCamino6);
        $manager->flush();

        $usuarioCamino7 = new UsuarioCamino();
        $usuarioCamino7->setStartDate("2020-02-01");
        $usuarioCamino7->setFinishDate("");
        $usuarioCamino7->setStatus("Archived");
        $usuarioCamino7->setUser($this->getReference(UserDataFixtures::USUARIO . 5));
        $usuarioCamino7->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 4));
        $manager->persist($usuarioCamino7);
        $manager->flush();
        
    }

    public function getDependencies()
    {
        return [
            CaminoDataFixtures::class,
            UserDataFixtures::class
        ];
    }
}
