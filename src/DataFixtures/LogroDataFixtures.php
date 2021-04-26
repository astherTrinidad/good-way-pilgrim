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
        $logro2->setName("El peregrino");
        $logro2->setDescription("50km. recorridos");
        $manager->persist($logro2);
        $manager->flush();
        $this->setReference(self::LOGRO . 3, $logro2);

        $logro3 = new Logro();
        $logro3->setName("La compostela");
        $logro3->setDescription("100km. recorridos");
        $manager->persist($logro3);
        $manager->flush();
        $this->setReference(self::LOGRO . 4, $logro3);

        $logro4 = new Logro();
        $logro4->setName("El sociable");
        $logro4->setDescription("Haces nuevos amigos");
        $manager->persist($logro4);
        $manager->flush();
        $this->setReference(self::LOGRO . 5, $logro4);

        $logro5 = new Logro();
        $logro5->setName("El políglota");
        $logro5->setDescription("Hablas en otro idioma");
        $manager->persist($logro5);
        $manager->flush();
        $this->setReference(self::LOGRO . 6, $logro5);

        $logro6 = new Logro();
        $logro6->setName("El glotón");
        $logro6->setDescription("Te das un homenaje de comida típica");
        $manager->persist($logro6);
        $manager->flush();
        $this->setReference(self::LOGRO . 7, $logro6);

        $logro7 = new Logro();
        $logro7->setName("El aventurero");
        $logro7->setDescription("Duermes al aire libre");
        $manager->persist($logro7);
        $manager->flush();
        $this->setReference(self::LOGRO . 8, $logro7);

        $logro8 = new Logro();
        $logro8->setName("El postureo");
        $logro8->setDescription("Te haces la fotaza del camino");
        $manager->persist($logro8);
        $manager->flush();
        $this->setReference(self::LOGRO . 9, $logro8);

        $logro9 = new Logro();
        $logro9->setName("El casanova");
        $logro9->setDescription("Conoces a alguien especial");
        $manager->persist($logro9);
        $manager->flush();
        $this->setReference(self::LOGRO . 10, $logro9);

        $logro10 = new Logro();
        $logro10->setName("El pupas");
        $logro10->setDescription("Te sale tu primera ampolla");
        $manager->persist($logro10);
        $manager->flush();
        $this->setReference(self::LOGRO . 11, $logro10);

        $logro11 = new Logro();
        $logro11->setName("El rezagado");
        $logro11->setDescription("Te quedas sin hostal por dormilón");
        $manager->persist($logro11);
        $manager->flush();
        $this->setReference(self::LOGRO . 12, $logro11);

        $logro12 = new Logro();
        $logro12->setName("El concertista");
        $logro12->setDescription("Roncas y te escucha todo el albergue");
        $manager->persist($logro12);
        $manager->flush();
        $this->setReference(self::LOGRO . 13, $logro12);

        $logro13 = new Logro();
        $logro13->setName("El brújula");
        $logro13->setDescription("Te pierdes por dártelas de guía");
        $manager->persist($logro13);
        $manager->flush();
        $this->setReference(self::LOGRO . 14, $logro13);

        $logro14 = new Logro();
        $logro14->setName("El lobo solitario");
        $logro14->setDescription("Ya no aguantas a tus compañeros de viaje");
        $manager->persist($logro14);
        $manager->flush();
        $this->setReference(self::LOGRO . 15, $logro14);

        $logro15 = new Logro();
        $logro15->setName("El realfooder");
        $logro15->setDescription("Comes bocata frío. Sí, otra vez");
        $manager->persist($logro15);
        $manager->flush();
        $this->setReference(self::LOGRO . 16, $logro15);

        $logro16 = new Logro();
        $logro16->setName("El filósofo");
        $logro16->setDescription("No dejas de preguntarte ¿Qué hago aquí?");
        $manager->persist($logro16);
        $manager->flush();
        $this->setReference(self::LOGRO . 17, $logro16);

        $logro17 = new Logro();
        $logro17->setName("El burbujitas");
        $logro17->setDescription("Te pasas con la sidra");
        $manager->persist($logro17);
        $manager->flush();
        $this->setReference(self::LOGRO . 18, $logro17);

        $logro18 = new Logro();
        $logro18->setName("El empapado");
        $logro18->setDescription("Descubres la lluvia del norte");
        $manager->persist($logro18);
        $manager->flush();
        $this->setReference(self::LOGRO . 19, $logro18);

        $logro19 = new Logro();
        $logro19->setName("El esquimal");
        $logro19->setDescription("En Galicia hace más frío del que pensabas");
        $manager->persist($logro19);
        $manager->flush();
        $this->setReference(self::LOGRO . 20, $logro19);
    }
}
