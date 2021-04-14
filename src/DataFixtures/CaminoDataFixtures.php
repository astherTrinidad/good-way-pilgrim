<?php

namespace App\DataFixtures;

use App\Entity\Camino;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CaminoDataFixtures extends Fixture
{  
    public const CAMINOS = array();

    public function load(ObjectManager $manager)
    {          
        $camino = new Camino();       
        $camino->setName("Camino Francés");
        $camino->setStart("Saint Jean de Pied de Port");
        $camino->setFinish("Santiago de Compostela");
        $camino->setNumEtapas(33); 
        $camino->setKm(764);
        $camino->setDescription("El Camino Francés es el Camino de Santiago de mayor relevancia histórica y el más seguido por los peregrinos. Se caracteriza por su variedad paisajística y su extraordinaria riqueza monumental.  Debe su origen a tres de las cuatro principales vías históricas de peregrinación que provienen del interior de Europa, las cuales confluyen en la pequeña villa de Ostabat, a pocos kilómetros de Saint Jean Pied de Port. La masificación es su mayor inconveniente.");  
        $manager->persist($camino);
        $manager->flush();
        CAMINOS_push($camino);
               
        $camino1 = new Camino();       
        $camino1->setName("Camino Primitivo");
        $camino1->setStart("Oviedo");
        $camino1->setFinish("Santiago de Compostela");
        $camino1->setNumEtapas(14); 
        $camino1->setKm(313);
        $camino1->setDescription("El Camino Primitivo es el Camino de Santiago que desde Oviedo se dirige a Compostela por el interior de Asturias y Galicia. Debe su origen a la peregrinación del rey Alfonso II de Asturias en el siglo IX, la primera de la que se conservan referencias (de ahí el nombre “Primitivo”). Este camino ha ganado en los últimos años un gran prestigio en el mundo jacobeo, gracias a sus paisajes, a su cierta dureza y a la aún moderada afluencia de peregrinos.");  
        $manager->persist($camino1);
        $manager->flush();
        CAMINOS_push($camino1);
        
        /*
        $camino2 = new Camino();       
        $camino2->setName("Camino del Norte");
        $camino2->setStart("Irún");
        $camino2->setFinish("Santiago de Compostela");
        $camino2->setNumEtapas(34); 
        $camino2->setKm(824);
        $camino2->setDescription("El Camino del Norte, también conocido como “Camino de la Costa”  recorre toda la costa peninsular bordeando los principales municipios del norte de España.");  
        $manager->persist($camino2);
        $manager->flush();

        $camino3 = new Camino();       
        $camino3->setName("Vía de la Plata");
        $camino3->setStart("Sevilla");
        $camino3->setFinish("Santiago de Compostela");
        $camino3->setNumEtapas(38); 
        $camino3->setKm(970);
        $camino3->setDescription("La Vía de la Plata es, el Camino de Santiago, más importante desde el sur peninsular. Hoy en día se considera Sevilla como la ciudad de inicio, y el itinerario debe su origen a un conjunto de calzadas romanas que unían el suroeste con el noroeste peninsular. Se caracteriza por las enormes distancias entre poblaciones, la soledad y las temperaturas extremas en verano. Los mejores meses para recorrerlo son marzo, abril, mayo y octubre.");  
        $manager->persist($camino3);
        $manager->flush();

        $camino4 = new Camino();       
        $camino4->setName("Camino Portugués");
        $camino4->setStart("Tui");
        $camino4->setFinish("Santiago de Compostela");
        $camino4->setNumEtapas(6); 
        $camino4->setKm(119);
        $camino4->setDescription("El Camino Portugués es un camino diferente. Comienza en el bonito pueblo de Tui. Tui es un pueblo fronterizo entre España y Portugal, ambos países son divididos por el río Miño y se puede ir de un país al otro atravesando el Puente Internacional. Caminaremos a través de grandes bosques, tierras de cultivo tradicionales y pequeñas aldeas y pueblos rurales así como ciudades históricas.  Es, probablemente, uno de los que menos desniveles tiene.");  
        $manager->persist($camino4);
        $manager->flush();  */             
    }
}

