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
        //Irene camino Francés        
        for ($j = 0; $j < 33; $j++) {
            if ($j == 4) {
                $usuarioCaminoEtapa = new UsuarioCaminoEtapa();
                $usuarioCaminoEtapa->setUser($this->getReference(UserDataFixtures::USUARIO . 2));
                $usuarioCaminoEtapa->setCaminoEtapa($this->getReference(CaminoEtapaDataFixtures::CAMINO_ETAPA_FRANCES . $j));
                $manager->persist($usuarioCaminoEtapa);
                $manager->flush();
                break;
            } else {
                $usuarioCaminoEtapa = new UsuarioCaminoEtapa();
                $usuarioCaminoEtapa->setUser($this->getReference(UserDataFixtures::USUARIO . 2));
                $usuarioCaminoEtapa->setCaminoEtapa($this->getReference(CaminoEtapaDataFixtures::CAMINO_ETAPA_FRANCES . $j));
                $manager->persist($usuarioCaminoEtapa);
                $manager->flush();
            }
        }

        //Irene camino Primitivo
        for ($j = 0; $j < 14; $j++) {
            $usuarioCaminoEtapa = new UsuarioCaminoEtapa();
            $usuarioCaminoEtapa->setUser($this->getReference(UserDataFixtures::USUARIO . 2));
            $usuarioCaminoEtapa->setCaminoEtapa($this->getReference(CaminoEtapaDataFixtures::CAMINO_ETAPA_PRIMITIVO . $j));
            $manager->persist($usuarioCaminoEtapa);
            $manager->flush();
        }

        //Asther camino primitivo
        for ($j = 0; $j < 14; $j++) {
            $usuarioCaminoEtapa = new UsuarioCaminoEtapa();
            $usuarioCaminoEtapa->setUser($this->getReference(UserDataFixtures::USUARIO . 3));
            $usuarioCaminoEtapa->setCaminoEtapa($this->getReference(CaminoEtapaDataFixtures::CAMINO_ETAPA_PRIMITIVO . $j));
            $manager->persist($usuarioCaminoEtapa);
            $manager->flush();
        }

        //Sara camino francés
        for ($j = 0; $j < 33; $j++) {
            $usuarioCaminoEtapa = new UsuarioCaminoEtapa();
            $usuarioCaminoEtapa->setUser($this->getReference(UserDataFixtures::USUARIO . 4));
            $usuarioCaminoEtapa->setCaminoEtapa($this->getReference(CaminoEtapaDataFixtures::CAMINO_ETAPA_FRANCES . $j));
            $manager->persist($usuarioCaminoEtapa);
            $manager->flush();
        }

        //Javi camino francés       
        for ($j = 0; $j < 33; $j++) {
            $usuarioCaminoEtapa = new UsuarioCaminoEtapa();
            $usuarioCaminoEtapa->setUser($this->getReference(UserDataFixtures::USUARIO . 5));
            $usuarioCaminoEtapa->setCaminoEtapa($this->getReference(CaminoEtapaDataFixtures::CAMINO_ETAPA_FRANCES . $j));
            $manager->persist($usuarioCaminoEtapa);
            $manager->flush();
        }

        //Javi camino Primitivo
        for ($j = 0; $j < 14; $j++) {
            if ($j == 12) {
                $usuarioCaminoEtapa = new UsuarioCaminoEtapa();
                $usuarioCaminoEtapa->setUser($this->getReference(UserDataFixtures::USUARIO . 5));
                $usuarioCaminoEtapa->setCaminoEtapa($this->getReference(CaminoEtapaDataFixtures::CAMINO_ETAPA_PRIMITIVO . $j));
                $manager->persist($usuarioCaminoEtapa);
                $manager->flush();
                break;
            } else {
                $usuarioCaminoEtapa = new UsuarioCaminoEtapa();
                $usuarioCaminoEtapa->setUser($this->getReference(UserDataFixtures::USUARIO . 5));
                $usuarioCaminoEtapa->setCaminoEtapa($this->getReference(CaminoEtapaDataFixtures::CAMINO_ETAPA_PRIMITIVO . $j));
                $manager->persist($usuarioCaminoEtapa);
                $manager->flush();
            }
        }
    }

    public function getDependencies()
    {
        return [
            CaminoEtapaDataFixtures::class,
            UserDataFixtures::class
        ];
    }
}
