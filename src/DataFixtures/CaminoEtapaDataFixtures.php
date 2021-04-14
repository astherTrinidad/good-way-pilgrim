<?php

namespace App\DataFixtures;

use App\Entity\Etapa;
use App\DataFixtures\CaminoDataFixtures;
use App\DataFixtures\EtapaDataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EtapaDataFixtures extends Fixture implements DependentFixtureInterface
{        
    public function load(ObjectManager $manager)
    {          
       for ($i = 0; $i < 2; $i++){
           for ($j = 0; $j < 6; $j++){
                $caminoEtapa = new CaminoEtapa();       
                $caminoEtapa->setNumEtapa($j+1);
                $caminoEtapa->setCamino($this->getReference(CaminoDataFixtures::CAMINOS[$j]));        
                $caminoEtapa->setEtapa($this->getReference(EtapaDataFixtures::ETAPAS[$i]));
                $manager->persist($caminoEtapa);
                $manager->flush(); 
           }
       }
        
        
        
        /*otro camino
        $etapa = new Etapa();       
        $etapa->setStart("");
        $etapa->setFinish("");        
        $etapa->setKm();
        $etapa->setDescription("");  
        $manager->persist($etapa);
        $manager->flush();*/        
       
    }

    public function getDependencies()
    {
        return [                
            EtapaDataFixtures::class,
            CaminoDataFixtures::class
        ];
    }
}

