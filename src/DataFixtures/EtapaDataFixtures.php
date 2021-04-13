<?php

namespace App\DataFixtures;

use App\Entity\Etapa;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EtapaDataFixtures extends Fixture
{    
    public function load(ObjectManager $manager)
    {          
        $etapa = new Etapa();       
        $etapa->setStart("");
        $etapa->setFinish("");        
        $etapa->setKm();
        $etapa->setDescription("");  
        $manager->persist($etapa);
        $manager->flush();
               
        $etapa1 = new Etapa();       
        $etapa1->setStart("");
        $etapa1->setFinish("");        
        $etapa1->setKm();
        $etapa1->setDescription("");  
        $manager->persist($etapa1);
        $manager->flush();
                
        $etapa2 = new Etapa();       
        $etapa2->setStart("");
        $etapa2->setFinish("");        
        $etapa2->setKm();
        $etapa2->setDescription("");  
        $manager->persist($etapa2);
        $manager->flush();

        $etapa3 = new Etapa();       
        $etapa3->setStart("");
        $etapa3->setFinish("");        
        $etapa3->setKm();
        $etapa3->setDescription("");  
        $manager->persist($etapa3);
        $manager->flush();

        $etapa4 = new Etapa();       
        $etapa4->setStart("");
        $etapa4->setFinish("");        
        $etapa4->setKm();
        $etapa4->setDescription("");  
        $manager->persist($etapa4);
        $manager->flush();               
    }
}

