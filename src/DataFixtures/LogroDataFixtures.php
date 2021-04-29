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
        $logro->setSlug("primeros-pasos");
        $manager->persist($logro);
        $manager->flush();
        $this->setReference(self::LOGRO . 1, $logro);

        $logro1 = new Logro();
        $logro1->setName("Un paseo");
        $logro1->setDescription("20km. recorridos");
        $logro1->setSlug("un-pase");
        $manager->persist($logro1);
        $manager->flush();
        $this->setReference(self::LOGRO . 2, $logro1);

        $logro2 = new Logro();
        $logro2->setName("El peregrino");
        $logro2->setDescription("50km. recorridos");
        $logro2->setSlug("el-peregrino");
        $manager->persist($logro2);
        $manager->flush();
        $this->setReference(self::LOGRO . 3, $logro2);

        $logro3 = new Logro();
        $logro3->setName("La compostela");
        $logro3->setDescription("100km. recorridos");
        $logro3->setSlug("la-compostela");
        $manager->persist($logro3);
        $manager->flush();
        $this->setReference(self::LOGRO . 4, $logro3);

        $logro4 = new Logro();
        $logro4->setName("El sociable");
        $logro4->setDescription("Haces nuevos amigos");
        $logro4->setSlug("el-sociable");
        $manager->persist($logro4);
        $manager->flush();
        $this->setReference(self::LOGRO . 5, $logro4);

        $logro5 = new Logro();
        $logro5->setName("El políglota");
        $logro5->setDescription("Hablas en otro idioma");
        $logro5->setSlug("el-poliglota");
        $manager->persist($logro5);
        $manager->flush();
        $this->setReference(self::LOGRO . 6, $logro5);

        $logro6 = new Logro();
        $logro6->setName("El glotón");
        $logro6->setDescription("Te das un homenaje de comida típica");
        $logro6->setSlug("el-gloton");
        $manager->persist($logro6);
        $manager->flush();
        $this->setReference(self::LOGRO . 7, $logro6);

        $logro7 = new Logro();
        $logro7->setName("El aventurero");
        $logro7->setDescription("Duermes al aire libre");
        $logro7->setSlug("el-aventurero");
        $manager->persist($logro7);
        $manager->flush();
        $this->setReference(self::LOGRO . 8, $logro7);

        $logro8 = new Logro();
        $logro8->setName("El postureo");
        $logro8->setDescription("Te haces la fotaza del camino");
        $logro8->setSlug("el-postureo");
        $manager->persist($logro8);
        $manager->flush();
        $this->setReference(self::LOGRO . 9, $logro8);

        $logro9 = new Logro();
        $logro9->setName("El casanova");
        $logro9->setDescription("Conoces a alguien especial");
        $logro9->setSlug("el-casanova");
        $manager->persist($logro9);
        $manager->flush();
        $this->setReference(self::LOGRO . 10, $logro9);

        $logro10 = new Logro();
        $logro10->setName("El pupas");
        $logro10->setDescription("Te sale tu primera ampolla");
        $logro10->setSlug("el-pupas");
        $manager->persist($logro10);
        $manager->flush();
        $this->setReference(self::LOGRO . 11, $logro10);

        $logro11 = new Logro();
        $logro11->setName("El rezagado");
        $logro11->setDescription("Te quedas sin hostal por dormilón");
        $logro11->setSlug("el-rezagado");
        $manager->persist($logro11);
        $manager->flush();
        $this->setReference(self::LOGRO . 12, $logro11);

        $logro12 = new Logro();
        $logro12->setName("El concertista");
        $logro12->setDescription("Roncas y te escucha todo el albergue");
        $logro12->setSlug("el-concertista");
        $manager->persist($logro12);
        $manager->flush();
        $this->setReference(self::LOGRO . 13, $logro12);

        $logro13 = new Logro();
        $logro13->setName("El brújula");
        $logro13->setDescription("Te pierdes por dártelas de guía");
        $logro13->setSlug("el-brujula");
        $manager->persist($logro13);
        $manager->flush();
        $this->setReference(self::LOGRO . 14, $logro13);

        $logro14 = new Logro();
        $logro14->setName("El lobo solitario");
        $logro14->setDescription("Ya no aguantas a tus compañeros de viaje");
        $logro14->setSlug("el-lobo-solitario");
        $manager->persist($logro14);
        $manager->flush();
        $this->setReference(self::LOGRO . 15, $logro14);

        $logro15 = new Logro();
        $logro15->setName("El realfooder");
        $logro15->setDescription("Comes bocata frío. Sí, otra vez");
        $logro15->setSlug("el-realfooder");
        $manager->persist($logro15);
        $manager->flush();
        $this->setReference(self::LOGRO . 16, $logro15);

        $logro16 = new Logro();
        $logro16->setName("El filósofo");
        $logro16->setDescription("No dejas de preguntarte ¿Qué hago aquí?");
        $logro16->setSlug("el-filosofo");
        $manager->persist($logro16);
        $manager->flush();
        $this->setReference(self::LOGRO . 17, $logro16);

        $logro17 = new Logro();
        $logro17->setName("El burbujitas");
        $logro17->setDescription("Te pasas con la sidra");
        $logro17->setSlug("el-burbujitas");
        $manager->persist($logro17);
        $manager->flush();
        $this->setReference(self::LOGRO . 18, $logro17);

        $logro18 = new Logro();
        $logro18->setName("El empapado");
        $logro18->setDescription("Descubres la lluvia del norte");
        $logro18->setSlug("el-empapado");
        $manager->persist($logro18);
        $manager->flush();
        $this->setReference(self::LOGRO . 19, $logro18);

        $logro19 = new Logro();
        $logro19->setName("El esquimal");
        $logro19->setDescription("En Galicia hace más frío del que pensabas");
        $logro19->setSlug("el-esquimal");
        $manager->persist($logro19);
        $manager->flush();
        $this->setReference(self::LOGRO . 20, $logro19);
    }
}
