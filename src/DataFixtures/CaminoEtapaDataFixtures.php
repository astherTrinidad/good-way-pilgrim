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
    public function load(ObjectManager $manager)
    {   
        //camino frances 
        $contador = 0;         
        for ($j = 1; $j < 34; $j++){  
            $contador++;            
            $caminoEtapa = new CaminoEtapa();       
            $caminoEtapa->setNumEtapa($contador);
            $caminoEtapa->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 1));        
            $caminoEtapa->setEtapa($this->getReference(EtapaDataFixtures::ETAPA . $j));
            $manager->persist($caminoEtapa);
            $manager->flush();            
        }  
        
        //camino primitivo
        $contador = 0;
        for ($j = 34; $j < 48; $j++){      
            $contador++; 
            $caminoEtapa = new CaminoEtapa();       
            $caminoEtapa->setNumEtapa($contador);
            $caminoEtapa->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 2));        
            $caminoEtapa->setEtapa($this->getReference(EtapaDataFixtures::ETAPA . $j));
            $manager->persist($caminoEtapa);
            $manager->flush();            
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

