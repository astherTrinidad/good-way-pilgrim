<?php

namespace App\DataFixtures;

use App\Entity\Etapa;
use App\DataFixtures\CaminoDataFixtures;
use App\DataFixtures\EtapaDataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CaminoEtapaDataFixtures extends Fixture implements DependentFixtureInterface
{        
    public function load(ObjectManager $manager)
    {          
       for ($i = 0; $i < 2; $i++){
           for ($j = 0; $j < 6; $j++){
                $caminoEtapa = new CaminoEtapa();       
                $caminoEtapa->setNumEtapa($j+1);
                $caminoEtapa->setCamino($this->getReference(CaminoDataFixtures::todosCaminos[$i]));        
                $caminoEtapa->setEtapa($this->getReference(EtapaDataFixtures::todasEtapas[$j]));
                $manager->persist($caminoEtapa);
                $manager->flush(); 
           }
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

