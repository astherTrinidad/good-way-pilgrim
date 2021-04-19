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
    public const CAMINO_ETAPA_FRANCES = "caminoEtapaFrances-";
    public const CAMINO_ETAPA_PRIMITIVO = "caminoEtapaPrimitivo-";

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
    }

    public function getDependencies()
    {
        return [
            EtapaDataFixtures::class,
            CaminoDataFixtures::class
        ];
    }
}
