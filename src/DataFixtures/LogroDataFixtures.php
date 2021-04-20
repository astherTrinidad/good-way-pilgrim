<?php

namespace App\DataFixtures;

use App\Entity\Logro;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LogroDataFixtures extends Fixture
{
    public const LOGRO = "logro-";

    public function load(ObjectManager $manager)
    {
        //meter usuarios        
        $logro = new Logro();
        $logro->setName("Primeros pasos");
        $logro->setDescription("10km. recorridos");
        $manager->persist($logro);
        $manager->flush();
        $this->setReference(self::LOGRO . 1, $logro);

        $logro1 = new Logro();
        $logro1->setName("Un paseo");
        $logro1->setDescription("20km. recorridos");
        $manager->persist($logro1);
        $manager->flush();
        $this->setReference(self::LOGRO . 2, $logro1);

        $logro2 = new Logro();
        $logro2->setName("El aventurero");
        $logro2->setDescription("Duermes al aire libre");
        $manager->persist($logro2);
        $manager->flush();
        $this->setReference(self::LOGRO . 3, $logro2);

        $logro3 = new Logro();
        $logro3->setName("El casanova");
        $logro3->setDescription("Conoces a alguien especial");
        $manager->persist($logro3);
        $manager->flush();
        $this->setReference(self::LOGRO . 4, $logro3);

        $logro4 = new Logro();
        $logro4->setName("El realfooder");
        $logro4->setDescription("Comes bocata frío. Sí, otra vez");
        $manager->persist($logro4);
        $manager->flush();
        $this->setReference(self::LOGRO . 5, $logro4);

        $logro5 = new Logro();
        $logro5->setName("El pupas");
        $logro5->setDescription("Te sale tu primera ampolla");
        $manager->persist($logro5);
        $manager->flush();
        $this->setReference(self::LOGRO . 6, $logro5);

        $logro6 = new Logro();
        $logro6->setName("El empapado");
        $logro6->setDescription("Descubres la lluvia del norte");
        $manager->persist($logro6);
        $manager->flush();
        $this->setReference(self::LOGRO . 7, $logro6);
    }
}
