<?php

namespace App\DataFixtures;

use App\Entity\CaminoEtapa;
use App\DataFixtures\CaminoDataFixtures;
use App\DataFixtures\EtapaDataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CaminoEtapaDataFixtures extends Fixture implements DependentFixtureInterface
{
    public static $caminoFrances = [];
    public static $caminoPrimitivo = [];
    public static $caminoNorte = [];
    public static $viaPlata = [];
    public static $caminoPortugues = [];
    
    public const CAMINO_ETAPA_FRANCES = "caminoEtapaFrances-";
    public const CAMINO_ETAPA_PRIMITIVO = "caminoEtapaPrimitivo-";
    public const CAMINO_ETAPA_NORTE = "caminoEtapaNorte-";
    public const VIA_PLATA = "caminoEtapaViaPlata-";
    public const CAMINO_PORTUGUES = "caminoEtapaPortugues-";

    public function load(ObjectManager $manager)
    {
        //camino frances 
        $contador = 0;
        for ($j = 1; $j < 34; $j++) {
            $contador++;
            $caminoEtapa = new CaminoEtapa();
            $caminoEtapa->setNumEtapa($contador);
            $caminoEtapa->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 1));
            $caminoEtapa->setEtapa($this->getReference(EtapaDataFixtures::ETAPA . $j));
            $manager->persist($caminoEtapa);
            $manager->flush();
            $caminoFrances[$contador - 1] = $caminoEtapa;
            $this->setReference(self::CAMINO_ETAPA_FRANCES . ($contador - 1), $caminoFrances[$contador - 1]);
        }


        //camino primitivo
        $contador = 0;
        for ($j = 34; $j < 48; $j++) {
            $contador++;
            $caminoEtapa1 = new CaminoEtapa();
            $caminoEtapa1->setNumEtapa($contador);
            $caminoEtapa1->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 2));
            $caminoEtapa1->setEtapa($this->getReference(EtapaDataFixtures::ETAPA . $j));
            $manager->persist($caminoEtapa1);
            $manager->flush();
            $caminoPrimitivo[$contador - 1] = $caminoEtapa1;
            $this->setReference(self::CAMINO_ETAPA_PRIMITIVO . ($contador - 1), $caminoPrimitivo[$contador - 1]);
        }
        
        //camino de norte
        $contador = 0;
        for ($j = 48; $j < 82; $j++) {
            $contador++;
            $caminoEtapa2 = new CaminoEtapa();
            $caminoEtapa2->setNumEtapa($contador);
            $caminoEtapa2->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 3));
            $caminoEtapa2->setEtapa($this->getReference(EtapaDataFixtures::ETAPA . $j));
            $manager->persist($caminoEtapa2);
            $manager->flush();
            $caminoNorte[$contador - 1] = $caminoEtapa2;
            $this->setReference(self::CAMINO_ETAPA_NORTE . ($contador - 1), $caminoNorte[$contador - 1]);
        }
        
        //via de la plata
        $contador = 0;
        for ($j = 82; $j < 120; $j++) {
            $contador++;
            $caminoEtapa3 = new CaminoEtapa();
            $caminoEtapa3->setNumEtapa($contador);
            $caminoEtapa3->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 4));
            $caminoEtapa3->setEtapa($this->getReference(EtapaDataFixtures::ETAPA . $j));
            $manager->persist($caminoEtapa3);
            $manager->flush();
            $viaPlata[$contador - 1] = $caminoEtapa3;
            $this->setReference(self::VIA_PLATA . ($contador - 1), $viaPlata[$contador - 1]);
        }
        
        //camino portugués
        $contador = 0;
        for ($j = 120; $j < 126; $j++) {
            $contador++;
            $caminoEtapa4 = new CaminoEtapa();
            $caminoEtapa4->setNumEtapa($contador);
            $caminoEtapa4->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 5));
            $caminoEtapa4->setEtapa($this->getReference(EtapaDataFixtures::ETAPA . $j));
            $manager->persist($caminoEtapa4);
            $manager->flush();
            $caminoPortugues[$contador - 1] = $caminoEtapa4;
            $this->setReference(self::CAMINO_PORTUGUES . ($contador - 1), $caminoPortugues[$contador - 1]);
        }
    }

    public function getDependencies()
    {
        return [
            EtapaDataFixtures::class,
            CaminoDataFixtures::class
        ];
    }
}
