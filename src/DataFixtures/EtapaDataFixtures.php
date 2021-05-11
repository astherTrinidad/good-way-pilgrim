<?php

namespace App\DataFixtures;

use App\Entity\Etapa;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EtapaDataFixtures extends Fixture
{    
   public const ETAPA = "etapa-";

    public function load(ObjectManager $manager)
    {             
       //Camino Frances
        $etapa = new Etapa();       
        $etapa->setStart("Saint Jean Pied de Port");
        $etapa->setFinish("Roncesvalles");        
        $etapa->setKm(24.2);
        $etapa->setDescription("Saint Jean Pied de Port es el segundo punto de partida más empleado para iniciar su andadura. Antigua ciudad, amurallada y rodeada de majestuosas montañas.La jornada inaugural reta al peregrino con un desnivel de más de 1250 metros que enlazan St.Jean Pied de Port con el Puerto de Lepoeder, la entrada a territorio español conocida como la ruta de Napoleón.");  
        $manager->persist($etapa);
        $manager->flush();
        $this->setReference(self::ETAPA . 1, $etapa);       
               
        $etapa1 = new Etapa();       
        $etapa1->setStart("Roncesvalles");
        $etapa1->setFinish("Zubiri");        
        $etapa1->setKm(21.4);
        $etapa1->setDescription("El camino se inicia atravesando el bosque de Sorginaritzaga o Robedal de las Brujas. Un hermoso bosque de hayas, robles y tréboles junto con lo bucólico del río Arga, en nuestra llegada a Zubiri, serán los grandes regalos de la jornada.");  
        $manager->persist($etapa1);
        $manager->flush();
        $this->setReference(self::ETAPA . 2, $etapa1);  
                
        $etapa2 = new Etapa();       
        $etapa2->setStart("Zubiri");
        $etapa2->setFinish("Pamplona");        
        $etapa2->setKm(20.4);
        $etapa2->setDescription("Comenzaremos la jornada cruzando el Puente de la Rabia. En lo alto de Akerreta, se ubica la iglesia de la Transfiguración en la que observaremos elementos medievales. Abandonaremos Zuriain siguiendo la carretera N-135 y volvemos a cruzar el río Arga por el puente de Iturgaiz. En la ruta de Huarte y retomaremos la senda tradicional a la altura de Trinidad de Arre. Siguiendo las señales del Camino de Santiago avanzaremos hasta el puente de la Magadalena dando acceso al casco antiguo de Pamplona.");  
        $manager->persist($etapa2);
        $manager->flush();
        $this->setReference(self::ETAPA . 3, $etapa2);  

        $etapa3 = new Etapa();       
        $etapa3->setStart("Pamplona");
        $etapa3->setFinish("Puente de la Reina");        
        $etapa3->setKm(23.9);
        $etapa3->setDescription("Descendemos la calle Curia a Mercaderes. Seguimos por la calle San Saturnino atravesando la calle Mayor. Cruzamos el puente de Acella que atraviesa el río Sadar. Tras dos kilómetros en la entrada de Cizur Menor veremos a la derecha un antiguo señorío despoblado. Subiendo estará el templo geométrico de San Andrés en Zariquiegui. En lo alto del Perdón descenderemos y atravesamos el arco puntado de la puerta de Obanos, seguimos la vega del río Robo hasta el Puente la Reina.");  
        $manager->persist($etapa3);
        $manager->flush($etapa3);
        $this->setReference(self::ETAPA . 4, $etapa3);  

        $etapa4 = new Etapa();       
        $etapa4->setStart("Puente de la Reina");
        $etapa4->setFinish("Estella");        
        $etapa4->setKm(21.6);
        $etapa4->setDescription("Atravesamos el arco que une la iglesia del Crucifijo con el convento de San Juan y accedemos a la calle Mayor. Llegamos a Zubiurrutia donde se ubica el convento de las Comendadoras del Sancti Spiritus. Avanzamos por el margen derecho del río Arga hasta Mañeru. A la salida, un camino rodeado de cereal y viñedos discurre hasta un pueblo medieval en lo alto de una colina, Ciraqui. Descendemos hasta llegar a la regata Dorrondoa. En Lorca seguimos a cruz de Maurien y nos dirigimos a Villatuerta.");  
        $manager->persist($etapa4);
        $manager->flush(); 
        $this->setReference(self::ETAPA . 5, $etapa4);  

        $etapa5 = new Etapa();       
        $etapa5->setStart("Estella");
        $etapa5->setFinish("Los Arcos");        
        $etapa5->setKm(21.3);
        $etapa5->setDescription("Abandonamos la localidad por las calles de la Rúa y San Nicolás, pasando junto al Palacio de los reyes de Navarra. Salimos a la calle Zalatambor y continuamos de frente después de la rotonda. Al pasar la gasolinera nos desviaremos a mano derecha hasta Ayegui. La ruta desciende hasta la fuente del Vino y el Monasterio de Irache. Cruzaremos la carretera N-111. Un conducto subterráneo nos permitirá acceder a campos de cultivo hasta Ázqueta. Junto a la senda encontramos Villamayor de Monjardín.");  
        $manager->persist($etapa5);
        $manager->flush($etapa5);
        $this->setReference(self::ETAPA . 6, $etapa5);  
        
        $etapa6 = new Etapa();       
        $etapa6->setStart("Los Arcos");
        $etapa6->setFinish("Logroño");        
        $etapa6->setKm(27.6);
        $etapa6->setDescription("En esta etapa del Camino de Santiago nos despedimos de Navarra para adentrarnos en La Rioja, tierra de vinos. A lo largo de la jornada de hoy saldrá a nuestro paso uno de los ríos más importantes de la península ibérica, el caudaloso y largo río Ebro. El recorrido de hoy finaliza en Logroño pero antes tendremos que salvar algunos desniveles.");  
        $manager->persist($etapa6);
        $manager->flush();
        $this->setReference(self::ETAPA . 7, $etapa6); 

        $etapa7 = new Etapa();       
        $etapa7->setStart("Logroño");
        $etapa7->setFinish("Nájera");        
        $etapa7->setKm(29);
        $etapa7->setDescription("A pesar de tratarse de una etapa de casi treinta kilómetros no albergará dificultad alguna para la mayoría de peregrinos. Caminaremos sobre pendientes de carácter moderado, rodeados de viñedos y árboles coloridos llenos de fruta. Cruzaremos por multitud de pueblos vinculados al Camino, para alcanzar el municipio de Nájera, denominación heredada de los árabes, Náxara, que significa “lugar entre peñas” o “lugar al mediodía”.");  
        $manager->persist($etapa7);
        $manager->flush();
        $this->setReference(self::ETAPA . 8, $etapa7); 

        $etapa8 = new Etapa();    
        $etapa8->setStart("Nájera");
        $etapa8->setFinish("Santo Domingo de La Calzada");        
        $etapa8->setKm(20.7);
        $etapa8->setDescription("Nos ponemos en marcha para dirigirnos hacia la siguiente localidad mágica del Camino: Santo Domingo de la Calzada, donde según la leyenda se obró el milagro del gallo y la gallina. Esta novena etapa discurre entre extensos campos de cereal y zonas agrícolas, y es junto con la anterior, una de las más largas del Camino Francés. Pero esto no supondrá un problema para los ya experimentados peregrinos, porque la ruta jacobea nos recompensará con bellos paisajes y de nuevo mágicas historias.");  
        $manager->persist($etapa8);
        $manager->flush();
        $this->setReference(self::ETAPA . 9, $etapa8); 

        $etapa9 = new Etapa();       
        $etapa9->setStart("Santo Domingo de La Calzada");
        $etapa9->setFinish("Belorado");        
        $etapa9->setKm(22.0);
        $etapa9->setDescription("Será en esta etapa cuando dejaremos atrás los viñedos de La Rioja para dar paso a los extensos campos de cereal de Castilla y León. Al igual que en el día de ayer, no tendremos que salvar grandes desniveles, pero sí que algún que otro cruce peligroso por carretera. Cruzaremos por varios pueblos bien abastecidos que nacieron a la vera del Camino para llegar a Belorado, al abrigo de la Sierra de la Demanda.");  
        $manager->persist($etapa9);
        $manager->flush();
        $this->setReference(self::ETAPA . 10, $etapa9); 

        $etapa10 = new Etapa();       
        $etapa10->setStart("Belorado");
        $etapa10->setFinish("San Juan de Ortega");        
        $etapa10->setKm(23.9);
        $etapa10->setDescription("El día de hoy transcurrirá entre paisajes de montaña y solitarios caminos donde poder desconectar y abandonar a nuestros pensamientos. Podemos dividir esta etapa en dos diferenciadas partes, la primera transcurre sin apenas repechos entre pequeños pueblos típicos del Camino, y la segunda comienza en Villafranca, desde donde tendremos que ascender a los Montes de Oca. Tan sólo los árboles y el murmullo del viento nos acompañarán en este tramo con vistas ya a San Juan de Ortega.");  
        $manager->persist($etapa10);
        $manager->flush();
        $this->setReference(self::ETAPA . 11, $etapa10); 

        $etapa11 = new Etapa();       
        $etapa11->setStart("San Juan de Ortega");
        $etapa11->setFinish("Burgos");        
        $etapa11->setKm(25.8);
        $etapa11->setDescription("En esta etapa de algo más de veinticinco kilómetros transcurriremos por terreno prácticamente llano, típico de las tierras de Castilla. El trazado original no cruza Atapuerca pero aquellos peregrinos que deseen visitar los yacimientos tienen a su disposición una variante señalizada. De la misma manera, para evitar el último tramo industrial que da acceso a Burgos, también podremos desviarnos por un paseo fluvial para luego enlazar con la ruta tradicional en la ciudad bañada por el río Arlanzón.");  
        $manager->persist($etapa11);
        $manager->flush();
        $this->setReference(self::ETAPA . 12, $etapa11); 

        $etapa12 = new Etapa();       
        $etapa12->setStart("Burgos");
        $etapa12->setFinish("Hornillos del Camino");        
        $etapa12->setKm(21.0);
        $etapa12->setDescription("Nos adentraremos de lleno en el paisaje castellano, con grandes llanuras y campos de cereal. El clima será extremo; si viajamos en verano las altas temperaturas y la ausencia de sombras donde resguardarnos pondrán a prueba nuestras cantimploras; en invierno, las fuertes ventiscas y nevadas impedirán que entremos en calor, ni tras haber recorrido algo más de treinta kilómetros. El encanto de los pueblos medievales que recorreremos nos devolverán la magia y el encanto de esta ruta milenaria.");  
        $manager->persist($etapa12);
        $manager->flush();
        $this->setReference(self::ETAPA . 13, $etapa12); 

        $etapa13 = new Etapa();       
        $etapa13->setStart("Hornillos del Camino");
        $etapa13->setFinish("Castrojeriz");        
        $etapa13->setKm(19.9);
        $etapa13->setDescription("Abandonaremos Hornillos del Camino entre sendas interminables y la única sombra de nuestra mochila. Unos cinco kilómetros después, una cruz de Santiago nos animará a continuar hacia San Bol, localidad por donde no discurre la ruta pero cuyo desvío está a escasos metros. Si proseguimos, ascenderemos por una senda pedregosa, cruzaremos una carretera y nos internaremos en un sendero que nos llevará a Hontanas, oculta entre valles. Tras una pequeña parada, dejamos esta localidad por su calle Mayor.");  
        $manager->persist($etapa13);
        $manager->flush();
        $this->setReference(self::ETAPA . 14, $etapa13); 

        $etapa14 = new Etapa();       
        $etapa14->setStart("Castrojeriz");
        $etapa14->setFinish("Frómista");        
        $etapa14->setKm(24.7);
        $etapa14->setDescription("El mayor desafío de esta etapa se encuentra en la subida al Alto de Mostelares, a partir del cual ya podremos escuchar el murmullo del Pisuerga, presagiando la cercanía de la siguiente gran ciudad: Palencia. Pero antes de llegar a ella aún haremos una parada en Frómista, localidad íntimamente ligada al Camino albergando por lo tanto un amplio patrimonio histórico destacando la iglesia de San Martín, uno de los templos románicos mejor conservados y completos de toda Europa.");  
        $manager->persist($etapa14);
        $manager->flush();
        $this->setReference(self::ETAPA . 15, $etapa14); 

        $etapa15 = new Etapa();       
        $etapa15->setStart("Frómista");
        $etapa15->setFinish("Carrión de los Condes");        
        $etapa15->setKm(18.8);
        $etapa15->setDescription("Día relajado, algo menos de veinte kilómetros separan Frómista de Carrión de los Condes. Esta etapa, de perfil claramente llano, se caracteriza por las monótonas llanuras castellanas, salpicadas por una sucesión de pueblos típicos del Camino donde podrás descansar a la sombra de monumentos de gran belleza y tradición jacobea.");  
        $manager->persist($etapa15);
        $manager->flush();
        $this->setReference(self::ETAPA . 16, $etapa15); 

        $etapa16 = new Etapa();       
        $etapa16->setStart("Carrión de los Condes");
        $etapa16->setFinish("Terradillos de los Templarios");        
        $etapa16->setKm(26.3);
        $etapa16->setDescription("Esta etapa no supone un gran desafío en cuanto a la orografía pero sí en cuanto a su longitud y a la ausencia de servicios durante algo más de diez kilómetros. Tampoco pasaremos por demasiados pueblos por lo que es necesario ir bien cargados de agua, sobre todo en verano. De nuevo, las interminables rectas entre campos de cereal nos harán el trayecto algo monótono pero a cambio, caminaremos por la mismísima Vía Aquitania, antigua calzada romana que enlazaba Burdeos con Astorga.");  
        $manager->persist($etapa16);
        $manager->flush();
        $this->setReference(self::ETAPA . 17, $etapa16); 

        $etapa17 = new Etapa();       
        $etapa17->setStart("Terradillos de los Templarios");
        $etapa17->setFinish("Bercianos del Real Camino");        
        $etapa17->setKm(23.2);
        $etapa17->setDescription("Palencia nos da paso ya a la provincia de León, por la cual discurre la mayor parte del Camino Francés, nada más y nada menos que doscientos quince kilómetros. Tras superar Sahagún el Camino se bifurca, ofreciéndonos dos alternativas para llegar finalmente a El Burgo Ranero, parando previamente en Bercianos del Real Camino.");  
        $manager->persist($etapa17);
        $manager->flush();
        $this->setReference(self::ETAPA . 18, $etapa17); 

        $etapa18 = new Etapa();       
        $etapa18->setStart("Bercianos del Real Camino");
        $etapa18->setFinish("Mansilla de las Mulas");        
        $etapa18->setKm(26.3);
        $etapa18->setDescription("Al igual que en algunas de las etapas anteriores, tendremos que avanzar durante bastantes kilómetros sin toparnos con población alguna, por lo que deberemos aprovisionarnos correctamente antes de partir. Mansilla de las Mulas, a pesar de ser una población de apenas unos dos mil habitantes, consta de todos los servicios necesarios para pernoctar en ella, por lo que es la localidad perfecta para finalizar la etapa y disfrutar a orillas del río Esla.");  
        $manager->persist($etapa18);
        $manager->flush();
        $this->setReference(self::ETAPA . 19, $etapa18); 

        $etapa19 = new Etapa();       
        $etapa19->setStart("Mansilla de las Mulas");
        $etapa19->setFinish("León");        
        $etapa19->setKm(18.5);
        $etapa19->setDescription("En algo menos de veinte kilómetros desde Mansilla de las Mulas alcanzaremos la majestuosa capital del antiguo reino de León con su imponente catedral como símbolo de identidad. Entre medias cambiaremos el Esla por el Porma y el Torío, aproximándonos a León por el barrio periférico de Puente Castro.");  
        $manager->persist($etapa19);
        $manager->flush();
        $this->setReference(self::ETAPA . 20, $etapa19); 

        $etapa20 = new Etapa();       
        $etapa20->setStart("León");
        $etapa20->setFinish("San Martín del Camino");        
        $etapa20->setKm(24.6);
        $etapa20->setDescription("Dejamos atrás la gran ciudad para adentrarnos de nuevo en la llanura castellana y los campos de trigo. Tendremos que elegir entre dos variantes, una que discurre por Villar de Matarife y la otra que sigue los pasos de trazado histórico hasta San Martín del Camino.");  
        $manager->persist($etapa20);
        $manager->flush();
        $this->setReference(self::ETAPA . 21, $etapa20); 

        $etapa21 = new Etapa();       
        $etapa21->setStart("San Martín del Camino");
        $etapa21->setFinish("Astorga");        
        $etapa21->setKm(23.7);
        $etapa21->setDescription("Tras dos etapas marcadas por la presencia del asfalto, en el día de hoy diremos adiós a la pista paralela a la N-120 para dar paso a un paisaje agrícola con pendientes cortas pero pronunciadas. De nuevo, tendremos la posibilidad de elegir una de las dos variantes existentes, con el punto de mira en Astorga, llena de vestigios romanos como sus famosas termas, edificios medievales y casas modernistas. Esta pequeña ciudad sirve también de enlace entre el Camino Francés y la Vía de la Plata.");  
        $manager->persist($etapa21);
        $manager->flush();
        $this->setReference(self::ETAPA . 22, $etapa21); 

        $etapa22 = new Etapa();       
        $etapa22->setStart("Astorga");
        $etapa22->setFinish("Foncebadón");        
        $etapa22->setKm(25.8);
        $etapa22->setDescription("Dejamos atrás la capital de la maragatería para afrontar una nueva etapa con dos partes bien diferenciadas. Los primeros kilómetros supondrán una sucesión de pueblos típicos de la llanura castellana, enmarcados todos ellos dentro del antiguamente conocido como País de los Maragatos o la Somoza. Caminaremos entre construcciones de sillarejo y vestigios de los antiguos arrieros, aquellos que se encargaban de transportar mercancías a lo largo y ancho de la península con ayuda de animales de carga.");  
        $manager->persist($etapa22);
        $manager->flush();
        $this->setReference(self::ETAPA . 23, $etapa22); 

        $etapa23 = new Etapa();       
        $etapa23->setStart("Foncebadón");
        $etapa23->setFinish("Ponferrada");        
        $etapa23->setKm(26.8);
        $etapa23->setDescription("Ascenderemos a una de las cimas más elevadas de este trazado jacobeo, la cruz de Ferro en el monte Irago, desde donde emprenderemos un acusado descenso hasta llegar a Ponferrada. Decimos adiós a las extensas e inhóspitas llanuras castellanas para ser recibidos por los montes del Bierzo y su prolífica vegetación, la cual nos acompañará en una de las etapas más duras para nuestras piernas.");  
        $manager->persist($etapa23);
        $manager->flush();
        $this->setReference(self::ETAPA . 24, $etapa23); 

        $etapa24 = new Etapa();       
        $etapa24->setStart("Ponferrada");
        $etapa24->setFinish("Villafranca");        
        $etapa24->setKm(24.2);
        $etapa24->setDescription("Quizá aún no nos estamos percatando, dada la presencia de las montañas del Bierzo resguardándonos del clima propiamente atlántico, pero nos estamos aproximando a Galicia. Poco a poco iremos dejando atrás las interminables rectas entre llanuras secas y monótonas, para dar paso a las vides y a la exuberante vegetación. Recorreremos pueblos bañados por la historia jacobea para acercarnos a la histórica Villafranca del Bierzo.");  
        $manager->persist($etapa24);
        $manager->flush();
        $this->setReference(self::ETAPA . 25, $etapa24); 

        $etapa25 = new Etapa();       
        $etapa25->setStart("Villafranca");
        $etapa25->setFinish("O Cebreriro");        
        $etapa25->setKm(27.8);
        $etapa25->setDescription("Ya nos separan menos de doscientos kilómetros de Santiago de Compostela y en el día de hoy abriremos las puertas de Galicia, concretamente a través del puerto de montaña de O Cebreiro, asentamiento prerrománico donde asomarnos a la comunidad gallega desde sus famosas pallozas. Muchos peregrinos optan por comenzar aquí su andadura, dada la importancia de este lugar y la belleza del mismo, un lugar que desde luego no dejará indiferente a nadie.");  
        $manager->persist($etapa25);
        $manager->flush();
        $this->setReference(self::ETAPA . 26, $etapa25); 

        $etapa26 = new Etapa();       
        $etapa26->setStart("O Cebreriro");
        $etapa26->setFinish("Triacastela");        
        $etapa26->setKm(20.8);
        $etapa26->setDescription("Tras la dura etapa de ayer hoy se nos presentan poco más de veinte kilómetros entre las sierra de O Courel y Os Ancares. Podremos respirar el aire más puro entre extensos y profundos valles repletos de castaños, robles, acebos, fresnos, etc, así como de la arquitectura y costumbres heredadas de la cultura castreña, una de las más antiguas de toda Europa. Descenderemos entre este bello paisaje hasta el valle que acoge a Triacastela, bajo la atenta mirada del monte Oribio.");  
        $manager->persist($etapa26);
        $manager->flush();
        $this->setReference(self::ETAPA . 27, $etapa26); 

        $etapa27 = new Etapa();       
        $etapa27->setStart("Triacastela");
        $etapa27->setFinish("Sarria");        
        $etapa27->setKm(17.8);
        $etapa27->setDescription("Para afrontar esta etapa disponemos de dos variantes diferenciadas para alcanzar Sarria, una que transcurre por la localidad de San Xil y que es la que defienden muchos por ser la original y otra que transcurre por Samos, siendo una opción secundaria y que cuenta por tanto con algún inconveniente, como es el caso de grandes tramos por asfalto que son compensados a nuestro paso por Samos donde podemos disfrutar del maravilloso monasterio que se esconde en este lugar.");  
        $manager->persist($etapa27);
        $manager->flush();
        $this->setReference(self::ETAPA . 28, $etapa27); 

        $etapa28 = new Etapa();       
        $etapa28->setStart("Sarria");
        $etapa28->setFinish("Portomarín");        
        $etapa28->setKm(22.2);
        $etapa28->setDescription("La etapa nos deparará una caminata agradecida, separada de carreteras de asfalto y abrazada a la Galicia más rural, donde disfrutaremos del campo y las pequeñas aldeas de los Concellos de Sarria, Paradela y Portomarín, además de cruzar ríos sobre puentes medievales y descubrir numerosos vestigios eclesiásticos de la época romana. Se trata de una etapa sencilla, con numerosos puntos de avituallamiento y una longitud moderada que no esconde desniveles pronunciados.");  
        $manager->persist($etapa28);
        $manager->flush();
        $this->setReference(self::ETAPA . 29, $etapa28); 

        $etapa29 = new Etapa();       
        $etapa29->setStart("Portomarín");
        $etapa29->setFinish("Palas de Rei");        
        $etapa29->setKm(24.8);
        $etapa29->setDescription("Una etapa que transcurre por mucho asfalto, fraccionada por la sierra de Ligonde, división natural de las cuencas de los ríos Miño y Ulloa. Numerosas iglesias románicas, el cruceiro de Os Lameiros o los yacimientos de Castromaior. A priori, se trata de una etapa sin mayores complicaciones, pero en algunas ocasiones deberemos afrontar pequeñas subidas que pueden hacerse muy “cuesta arriba” en función de las fuerzas que tengamos acumuladas a la hora de emprender el ascenso.");  
        $manager->persist($etapa29);
        $manager->flush();
        $this->setReference(self::ETAPA . 30, $etapa29); 

        $etapa30 = new Etapa();       
        $etapa30->setStart("Palas de Rei");
        $etapa30->setFinish("Arzúa");        
        $etapa30->setKm(28.5);
        $etapa30->setDescription("En esta etapa se abandona la provincia de Lugo para adentrarse en la provincia de A Coruña, donde se adentra a través de la aldea de O Coto, límite fronterizo entre ambas provincias. Una etapa exigente donde son frecuentes las subidas cortas pero dificultosas, en la que conviven tramos en un estado de conservación excepcional que atraviesan aldeas maravillosas de la Galicia profunda, con zonas menos gratificantes como polígonos industriales o tramos con un estado de conservación muy mejorable.");  
        $manager->persist($etapa30);
        $manager->flush();
        $this->setReference(self::ETAPA . 31, $etapa30); 

        $etapa31 = new Etapa();       
        $etapa31->setStart("Arzúa");
        $etapa31->setFinish("Pedrouzo");        
        $etapa31->setKm(19.3);
        $etapa31->setDescription("Llegados a este punto, y a tan solo 40 kilómetros de entrar en la plaza del Obradoiro y contemplar nuestro destino, disponemos de varias opciones, siendo la más recomendable hacer noche en O Pedrouzo, dado que se trata de un lugar que dispone de todos los servicios necesarios y nos permite dejar una pequeña etapa para finalizar nuestro camino para el día siguiente. Es recomendable dividir la etapa en dos, y disfrutar de las dos últimas jornadas que nos restan para llegar a Compostela.");  
        $manager->persist($etapa31);
        $manager->flush();
        $this->setReference(self::ETAPA . 32, $etapa31); 

        $etapa32 = new Etapa();       
        $etapa32->setStart("Pedrouzo");
        $etapa32->setFinish("Santiago de Compostela");        
        $etapa32->setKm(19.4);
        $etapa32->setDescription("Santiago aguarda y eso se nota en los caminantes. Algunos con paso ligero y con la mente puesta en la meta, otros sin embargo, con el paso sosegado de aquel que tiene miedo de llegar al final de su aventura y no saber lo que vendrá después. En cualquier caso, todos con la ilusión de alcanzar por fin la majestuosa plaza del Obradoiro y alzar la vista para vislumbrar la barroca fachada de la Catedral. Por delante, una etapa corta, sencilla, con pendientes moderadas y senderos agradecidos.");  
        $manager->persist($etapa32);
        $manager->flush();
        $this->setReference(self::ETAPA . 33, $etapa32); 

        //Camino Primitivo
        $etapa33 = new Etapa();       
        $etapa33->setStart("Oviedo");
        $etapa33->setFinish("San Juan de Villapañada");        
        $etapa33->setKm(27);
        $etapa33->setDescription("Iniciaremos el Camino en el centro de Oviedo desde la Catedral de El Salvador en dirección al oeste fuera de la ciudad. Después pasaremos por la capilla de El Carmen en Lampajúa y continuaremos hasta Ponte de Gallegos.");  
        $manager->persist($etapa33);
        $manager->flush();
        $this->setReference(self::ETAPA . 34, $etapa33); 

        $etapa34 = new Etapa();       
        $etapa34->setStart("San Juan de Villapañada");
        $etapa34->setFinish("Salas");        
        $etapa34->setKm(18.2);
        $etapa34->setDescription("Empezaremos el día con una pequeña subida de 5 kilómetros hasta llegar a Alto del Fresno. Los siguientes kilómetros de la etapa son más fáciles, descenderemos por pequeños pueblos y tierras de cultivo montañas y pasaremos por el monasterio de San Savaldor. Es recomendable visitar una visita al monasterio de San Salvador. A partir de Cornellana podremos ver muchos graneros típicos de la región de Asturias hasta finalmente llegar a Salas.");  
        $manager->persist($etapa34);
        $manager->flush();
        $this->setReference(self::ETAPA . 35, $etapa34); 

        $etapa35 = new Etapa();       
        $etapa35->setStart("Salas");
        $etapa35->setFinish("Tineo");        
        $etapa35->setKm(19.8);
        $etapa35->setDescription("Esta es una de las etapas más cortas del Camino Primitivo pero también es una de las más dificultes debido a la cantidad de subidas que hay que realizar, estas subidas se concentran principalmente en los primeros kilómetros de la etapa.");  
        $manager->persist($etapa35);
        $manager->flush();
        $this->setReference(self::ETAPA . 36, $etapa35); 

        $etapa36 = new Etapa();       
        $etapa36->setStart("Tineo");
        $etapa36->setFinish("Pola de Allande");        
        $etapa36->setKm(26.4);
        $etapa36->setDescription("Como si de una montaña rusa se tratase en esta etapa ascenderemos y descenderemos en multitud de ocasiones a través de valles y bosques bañados por el agua de los ríos asturianos. Atravesaremos encantadores bosques así como el bonito pueblo de Vega de Rey. La última parte de la etapa implica un importante descenso de 300 metros hasta llegar a Pola de Allende.Esta parroquia también destaca por la presencia en lo alto de una colina del Palacio de Cienfuegos.");  
        $manager->persist($etapa36);
        $manager->flush();
        $this->setReference(self::ETAPA . 37, $etapa36); 

        $etapa37 = new Etapa();       
        $etapa37->setStart("Pola de Allande");
        $etapa37->setFinish("La Mesa");        
        $etapa37->setKm(21.6);
        $etapa37->setDescription("Esta etapa está considerada una de las más bellas de esta ruta Primitiva, ya que corona el alto del Puerto, puerto de montaña a algo más de mil metros de altitud y desde donde se pueden apreciar unas espectaculares vistas del valle del río Nisón y las cercanas montañas de Lugo. Sin embargo esta recompensa no será gratuita ya que tendremos que sufrir pendientes positivas de alrededor del cinco por ciento en muchos casos.");  
        $manager->persist($etapa37);
        $manager->flush();
        $this->setReference(self::ETAPA . 38, $etapa37); 

        $etapa38 = new Etapa();       
        $etapa38->setStart("La Mesa");
        $etapa38->setFinish("Grandas de Salime");        
        $etapa38->setKm(15.2);
        $etapa38->setDescription("De carácter principalmente descendente nos dirigiremos hacia el embalse de Salime, bañado por las aguas del río Navia. La construcción de este embalse cambió por completo la orografía y fisionomía de la zona, siendo necesario inundar varias zonas habitadas y numerosas iglesias y cementerios. Tras cruzar la presa iniciaremos una ruta ascendente, lenta pero constante, para llegar hasta Grandas de Salime, último tramo asturiano de esta ruta jacobea.");  
        $manager->persist($etapa38);
        $manager->flush();
        $this->setReference(self::ETAPA . 39, $etapa38); 

        $etapa39 = new Etapa();       
        $etapa39->setStart("Grandas de Salime");
        $etapa39->setFinish("A Fonsagrada");        
        $etapa39->setKm(25.2);
        $etapa39->setDescription("Entraremos en en la provincia de Lugo y en el lugar de Acebo. Este es el punto de partida elegido por los peregrinos que optan por realizar sólo la parte del camino primitivo que discurre por Galicia. Conviene resaltar que a partir de aquí, no sólo cambiamos de comunidad sino también de indicaciones. En Asturias las famosas vieiras o conchas señalizaban el camino a seguir por su parte estrecha mientras que en las tierras del apóstol debemos guiarnos por la parte abierta de las mismas.");  
        $manager->persist($etapa39);
        $manager->flush();
        $this->setReference(self::ETAPA . 40, $etapa39); 

        $etapa40 = new Etapa();       
        $etapa40->setStart("A Fonsagrada");
        $etapa40->setFinish("O Cádavo Baleira");        
        $etapa40->setKm(24.3);
        $etapa40->setDescription("A pesar de la dureza de la jornada de hoy disfrutaremos enormemente de las vistas y de caminos donde tan sólo nos acompañarán extensos pinares y la exuberante vegetación de los bosques gallegos. El descenso desde el Hospital de Montouto pondrá a prueba nuestras rodillas, así como los sucesivos toboganes por los que tendremos que discurrir para alcanzar O Cádavo, en la provincia de Lugo. Acabaremos en O Cádavo dotada de albergue y todos los establecimientos que pudiésemos necesitar.");  
        $manager->persist($etapa40);
        $manager->flush();
        $this->setReference(self::ETAPA . 41, $etapa40); 

        $etapa41 = new Etapa();       
        $etapa41->setStart("O Cádavo Baleira");
        $etapa41->setFinish("Lugo");        
        $etapa41->setKm(29.5);
        $etapa41->setDescription("Retomamos el camino partiendo del albergue de O Cádavo en dirección al centro del pueblo, concretamente a la plaza situada detrás de la casa consistorial. Algo más de treinta kilómetros nos separan de la urbe romana amurallada de Lugo, distancia que recorreremos ansiosos para alcanzar esta gran ciudad. Pero esto no debe distraernos ya que entre medias degustaremos la belleza del rural gallego, con multitud de pequeñas aldeas y restos arqueológicos con mil historias que contar.");  
        $manager->persist($etapa41);
        $manager->flush();
        $this->setReference(self::ETAPA . 42, $etapa41); 

        $etapa42 = new Etapa();       
        $etapa42->setStart("Lugo");
        $etapa42->setFinish("San Romao");        
        $etapa42->setKm(19.6);
        $etapa42->setDescription("Alternando asfalto con caminos rurales saldremos de la ciudad de Lugo rumbo a San Román da Retorta. A diferencia de etapas anteriores, en el día de hoy tan sólo unos veinte kilómetros separan ambas localidades por lo que podemos tomárnoslo con calma. Para finalizar esta etapa tenemos varias opciones: la tradicional, terminar en San Román, o continuar hasta Ponte Ferreira, en el concello de Palas de Rei.");  
        $manager->persist($etapa42);
        $manager->flush();
        $this->setReference(self::ETAPA . 43, $etapa42); 

        $etapa43 = new Etapa();       
        $etapa43->setStart("San Romao");
        $etapa43->setFinish("Melide");        
        $etapa43->setKm(28.3);
        $etapa43->setDescription("En el día de hoy nos encontraremos con los peregrinos procedentes de Francia, enlazando así con la ruta del Camino Francés desde Melide. A través de caminos rurales de tierra y asfaltados avanzaremos entre pequeñas aldeas con un clara vinculación jacobea y con mucho encanto. Existen dos alternativas para realizar esta etapa, decantándonos por la conocida como variante de la “calzada romana”, por ser un poco más corta que la oficial.");  
        $manager->persist($etapa43);
        $manager->flush();
        $this->setReference(self::ETAPA . 44, $etapa43); 

        $etapa44 = new Etapa();       
        $etapa44->setStart("Melide");
        $etapa44->setFinish("Arzúa");        
        $etapa44->setKm(14);
        $etapa44->setDescription("En esta etapa se abandona la provincia de Lugo para adentrarse en la última de las provincias por las que discurre, la provincia de A Coruña. Es una etapa exigente, con un perfil quebrado e irregular, donde son frecuentes las subidas cortas pero dificultosas, en la que conviven tramos en un estado de conservación excepcional que atraviesan aldeas maravillosas de la Galicia profunda con zonas menos gratificantes como polígonos industriales o tramos con un estado de conservación muy mejorable.");  
        $manager->persist($etapa44);
        $manager->flush();
        $this->setReference(self::ETAPA . 45, $etapa44); 

        $etapa45 = new Etapa();       
        $etapa45->setStart("Arzúa");
        $etapa45->setFinish("Pedrouzo");        
        $etapa45->setKm(19.3);
        $etapa45->setDescription("Llegados a este punto, y a tan solo 40 kilómetros de entrar en la plaza del Obradoiro y contemplar nuestro destino, disponemos de varias opciones, siendo la más recomendable hacer noche en O Pedrouzo, dado que se trata de un lugar que dispone de todos los servicios necesarios y nos permite dejar una pequeña etapa para finalizar nuestro camino para el día siguiente. Es recomendable dividir la etapa en dos, y disfrutar de las dos últimas jornadas que nos restan para llegar a Compostela.");  
        $manager->persist($etapa45);
        $manager->flush();
        $this->setReference(self::ETAPA . 46, $etapa45); 

        $etapa46 = new Etapa();       
        $etapa46->setStart("Pedrouzo");
        $etapa46->setFinish("Santiago de Compostela");        
        $etapa46->setKm(19.4);
        $etapa46->setDescription("Santiago aguarda y eso se nota en los caminantes. Algunos con paso ligero y con la mente puesta en la meta, otros sin embargo, con el paso sosegado de aquel que tiene miedo de llegar al final de su aventura y no saber lo que vendrá después. En cualquier caso, todos con la ilusión de alcanzar por fin la majestuosa plaza del Obradoiro y alzar la vista para vislumbrar la barroca fachada de la Catedral. Por delante, una etapa corta, sencilla, con pendientes moderadas y senderos agradecidos.");  
        $manager->persist($etapa46);
        $manager->flush();
        $this->setReference(self::ETAPA . 47, $etapa46);
        
        //Camino del Norte
        
        $etapa47 = new Etapa();       
        $etapa47->setStart("Irún");
        $etapa47->setFinish("San Sebastián");        
        $etapa47->setKm(24.8);
        $etapa47->setDescription("Comenzamos esta Ruta Jacobea, una de las más antiguas, en la frontera francesa y española. Partiremos de la bella Irún rumbo a la gran ciudad de San Sebastián y a su famosa playa de la Concha. El trayecto no será fácil, tendremos que sufrir el peso de nuestras mochilas en las innumerables pendientes tanto positivas como negativas de esta etapa. Sin embargo, la belleza de los parajes por los que transcurriremos será una recompensa más que suficiente.");  
        $manager->persist($etapa47);
        $manager->flush();
        $this->setReference(self::ETAPA . 48, $etapa47);
        
        $etapa48 = new Etapa();       
        $etapa48->setStart("San Sebastián");
        $etapa48->setFinish("Zarautz");        
        $etapa48->setKm(22.2);
        $etapa48->setDescription("El monte Igeldo enseña al inicio sus fauces, pero se amansa fácilmente y recompensa con una panorámica privilegiada de San Sebastián. La senda jacobea continúa atravesando Igeldo, entre zonas residenciales y caseríos y con el Cantábrico como telón de fondo. Atravesamos el cordal de Mendizorrotz, sinuoso y a su vez rico en barro y antiguas calzadas, y descender hasta Orio. Un último repecho al Talaimendi, con fragancia de txakoli, con una gran estampa de Zarautz y su interminable playa.");  
        $manager->persist($etapa48);
        $manager->flush();
        $this->setReference(self::ETAPA . 49, $etapa48);
        
        $etapa49 = new Etapa();       
        $etapa49->setStart("Zarautz");
        $etapa49->setFinish("Deba");        
        $etapa49->setKm(21.8);
        $etapa49->setDescription("Etapa pura del litoral guipuzcoano que obliga a superar incontables desniveles entre las bellas localidades marineras de Getaria -cuna de Juan Sebastián Elcano-, Zumaia y Deba, y los núcleos de Askizu, Elorriaga e Itziar, atalayas privilegiadas sobre las frondosas colinas cantábricas. Esta orografía, prepara al peregrino para la etapa reina que vivirá mañana, cuando la sirga caminera se aleje del mar durante varios días para seguir el itinerario más recto posible.");  
        $manager->persist($etapa49);
        $manager->flush();
        $this->setReference(self::ETAPA . 50, $etapa49);
        
        $etapa50 = new Etapa();       
        $etapa50->setStart("Deba");
        $etapa50->setFinish("Markina");        
        $etapa50->setKm(24);
        $etapa50->setDescription("Ante el peregrino, la etapa más interior, montañosa y con mayor desnivel de todas las del País Vasco. El trazado comienza su ascenso decidido ya en Deba, escalando a la ermita del Calvario de Maia. de Camino a Olatz, a través de túneles de encinar cantábrico, el mar desaparecerá de la retina hasta la etapa 8. El curso del arroyo Anu hace de calentamiento para el tramo más costoso, el que asciende por pista y bosque la ladera del macizo de Arno, que divide Gipuzkoa y Bizkaia.");  
        $manager->persist($etapa50);
        $manager->flush();
        $this->setReference(self::ETAPA . 51, $etapa50);
        
        $etapa51 = new Etapa();       
        $etapa51->setStart("Markina");
        $etapa51->setFinish("Gernika");        
        $etapa51->setKm(24.6);
        $etapa51->setDescription("Por sendas sombrías e intrincadas la ruta de la Costa desciende hasta Gerrikaitz y Munitibar, heredero de las anteiglesias, y prosigue hacia los de Mendata y Arratzu. Aquí, en los verdes rincones de Urdaibai, emergen ermitas, torres, calzadas ocultas del medievo y robledales milenarios que hacen olvidar por momentos las densas repoblaciones de pino insigne. Remontando por Marmiz y la falda del Burgonana descendemos hasta la iglesia neoclásica de Ajangiz y Gernika-Lumo.");  
        $manager->persist($etapa51);
        $manager->flush();
        $this->setReference(self::ETAPA . 52, $etapa51);
        
        $etapa52 = new Etapa();       
        $etapa52->setStart("Gernika");
        $etapa52->setFinish("Lezama");        
        $etapa52->setKm(20.8);
        $etapa52->setDescription("Dejamos Gernika con la mirada puesta ya en Bilbao, aunque aún tendremos que hacer una parada en la cercana Lezama. A través de antiguas sendas arboladas, centenarias anteiglesias y arroyos caudalosos caminaremos sobre tierras de la Reserva de la Biosfera de Urdaibai, área natural de gran riqueza tanto ecológica como paisajística.");  
        $manager->persist($etapa52);
        $manager->flush();
        $this->setReference(self::ETAPA . 53, $etapa52);
        
        $etapa53 = new Etapa();       
        $etapa53->setStart("Lezama");
        $etapa53->setFinish("Bilbao");        
        $etapa53->setKm(10.8);
        $etapa53->setDescription("Antes de entrar en Bilbao aún tendremos que superar un último escollo: ascender al monte Avril, en este caso dejamos la carretera unos metros más adelante para tomar un sendero sobre un antiguo sendero real que partía de Bermeo. Sin embargo esta etapa nos resultará sencilla en comparación con la dureza de las anteriores. Ya desde lo alto podremos apreciar la ciudad más poblada de la comunidad foral, fundada en el siglo XIII y famosa por el museo Guggenheim, a orillas de la ría de Bilbao.");  
        $manager->persist($etapa53);
        $manager->flush();
        $this->setReference(self::ETAPA . 54, $etapa53);
        
        $etapa54 = new Etapa();       
        $etapa54->setStart("Bilbao");
        $etapa54->setFinish("Portugalete");        
        $etapa54->setKm(19.4);
        $etapa54->setDescription("Nos dirigimos a uno de los municipios con mayor densidad de población por kilómetro cuadrado de toda España. Esto marcará la etapa de hoy ya que tendremos que salir de Bilbao desde su centro histórico y pasar por alguno de sus barrios periféricos y áreas industriales o comerciales. Pero rápidamente nos reencontraremos con la naturaleza y con nuestro fiel compañero de viaje: el río Nervión, el cual traspasaremos por el impresionante Puente Colgante o Puente Palacio para acceder a Portugalete.");  
        $manager->persist($etapa54);
        $manager->flush();
        $this->setReference(self::ETAPA . 55, $etapa54);
        
        $etapa55 = new Etapa();       
        $etapa55->setStart("Portugalete");
        $etapa55->setFinish("Castro Urdiales");        
        $etapa55->setKm(27.6);
        $etapa55->setDescription("Esta etapa puede dividirse en dos y hacer noche en Pobeña, paso previo a Castro Urdiales. Pasaremos por pueblos con una clara tradición minera, caminando sobre antiguas vías ferroviarias que servían para transportar el hierro extraído de yacimientos cercanos. A pesar de que nos desmarcaremos de la frescura del mar Cantábrico que no cunda el pánico, nos reencontraremos con él antes de llegar a Castro Urdiales.");  
        $manager->persist($etapa55);
        $manager->flush();
        $this->setReference(self::ETAPA . 56, $etapa55);
        
        $etapa56 = new Etapa();       
        $etapa56->setStart("Castro Urdiales");
        $etapa56->setFinish("Lareado");        
        $etapa56->setKm(26.6);
        $etapa56->setDescription("Nos despedimos de Castro a lo grande, en la iglesia de Santa María de la Asunción y a orillas del Cantábrico. Por las calles Arturo Dúo Vidal y Silvestre Ochoa salimos a la carretera nacional, donde torcemos a la derecha ascendiendo al Campijo. Nos internamos momentáneamente por parajes de interior, permaneciendo aún dentro de los dominios de Castro Urdiales para desembocar en Laredo, antiguo territorio de los coniscos (antigua tribu cántabra).");  
        $manager->persist($etapa56);
        $manager->flush();
        $this->setReference(self::ETAPA . 57, $etapa56);
        
        $etapa57 = new Etapa();       
        $etapa57->setStart("Lareado");
        $etapa57->setFinish("Guemes");        
        $etapa57->setKm(29);
        $etapa57->setDescription("Para todos aquellos que puedan disfrutarlo, el cruzar la ría en barca hacia Santoña será una experiencia única, con unas vistas espectaculares. Los que viajen en invierno tendrán que desviarse por la variante de interior o realizar este tramo en transporte público o privado. Sin embargo, cualquiera de las dos alternativas transcurre por bellos lugares, con mil historias que contar y rodeados de las marismas de Santoña y Noja.");  
        $manager->persist($etapa57);
        $manager->flush();
        $this->setReference(self::ETAPA . 58, $etapa57);
        
        $etapa58 = new Etapa();       
        $etapa58->setStart("Guemes");
        $etapa58->setFinish("Santander");        
        $etapa58->setKm(11.8);
        $etapa58->setDescription("Salimos de Güemes buscando la CA-444 camino de Gargollo, donde enlazamos con la CA-443 durante un trecho hasta Linderrio. Un poco más delante volvemos a la comarcal para alcanzar Galizano, donde podremos visitar la iglesia de Nuestra Señora de la Asunción del siglo XVI pero cuya construcción se demoró hasta dos siglos más tarde. Es el exponente máximo del gótico cántabro de todo el municipio, destacando de su interior el retablo mayor y otros dos de la capilla del Rosario.");  
        $manager->persist($etapa58);
        $manager->flush();
        $this->setReference(self::ETAPA . 59, $etapa58);
        
        $etapa59 = new Etapa();       
        $etapa59->setStart("Santander");
        $etapa59->setFinish("Santillana del Mar");        
        $etapa59->setKm(37);
        $etapa59->setDescription("Dura etapa, no tanto por la orografía sino más bien por el elevado kilometraje. Con la constante compañía del río Pas, el cual tendremos que salvar en varias ocasiones incluso dando considerables rodeos para evitarlo, avanzaremos poco a poco rumbo a Queveda y a la cercana Santillana del Mar. Para los que no deseen caminar tanto existen varias alternativas que analizamos más en profundidad en el apartado del itinerario.");  
        $manager->persist($etapa59);
        $manager->flush();
        $this->setReference(self::ETAPA . 60, $etapa59);
        
        $etapa60 = new Etapa();       
        $etapa60->setStart("Santillana del Mar");
        $etapa60->setFinish("Comillas");        
        $etapa60->setKm(22);
        $etapa60->setDescription("Esta etapa, de nuevo con varios puntos intermedios donde poder dividir la jornada, transcurre por impresionantes parajes como el parque natural de Oyambre y por numerosos puntos declarados como Bienes de Interés Cultural. Finalizemos la etapa en Comillas o si lo deseamos en San Vicente de la Barquera, donde tendremos en ambos casos infinidad de puntos de interés que visitar. ");  
        $manager->persist($etapa60);
        $manager->flush();
        $this->setReference(self::ETAPA . 61, $etapa60);
        
        $etapa61 = new Etapa();       
        $etapa61->setStart("Comillas");
        $etapa61->setFinish("Colombres");        
        $etapa61->setKm(28.8);
        $etapa61->setDescription("Tanto si salimos de Comillas como de San Vicente, en el día de hoy diremos adiós a la comunidad cántabra para adentrarnos en Asturias, capital de la sidra. Bordearemos el Cantábrico y sus numerosas rías, las cuales nos regalan paisajes de ensueño y formaciones geológicas impresionantes. En cualquier punto del trayecto podrás disfrutar de la rica gastronomía asturiana, fundiéndose con la cántabra en muchos aspectos.");  
        $manager->persist($etapa61);
        $manager->flush();
        $this->setReference(self::ETAPA . 62, $etapa61);
        
        $etapa62 = new Etapa();       
        $etapa62->setStart("Colombres");
        $etapa62->setFinish("Llanes");        
        $etapa62->setKm(23.2);
        $etapa62->setDescription("Etapa marcada por la existencia de varias alternativas para arribar en la marinera Llanes. Podremos seguir el trazado de la costa, visitando así los famosos bufones de Arenillas y pasando por Andrín o desviarnos desde Pendueles por la senda tradicional que discurre más hacia el interior. Ambas opciones confluyen unos tres kilómetros antes de alcanzar Llanes, villa con un gran patrimonio artístico y natural, destacando el palacio del Conde de la Vega del Sella.");  
        $manager->persist($etapa62);
        $manager->flush();
        $this->setReference(self::ETAPA . 63, $etapa62);
        
        $etapa63 = new Etapa();       
        $etapa63->setStart("Llanes");
        $etapa63->setFinish("Ribadesella");        
        $etapa63->setKm(31.4);
        $etapa63->setDescription("Hoy iremos en busca de la famosa Ribadesella, reconocida por el descenso del Sella en canoa. Además caminaremos por numerosos pueblos y localidades marineras, donde relajar los pies en una de sus calas y playas bañadas por el Cantábrico y sus rías. Algo más de treinta kilómetros separan Llanes de Ribadesella, pero sin duda el encanto de las villas y sus arenales recompensarán el esfuerzo realizado.");  
        $manager->persist($etapa63);
        $manager->flush();
        $this->setReference(self::ETAPA . 64, $etapa63);
        
        $etapa64 = new Etapa();       
        $etapa64->setStart("Ribadesella");
        $etapa64->setFinish("Sebrayo");        
        $etapa64->setKm(31.6);
        $etapa64->setDescription("Seguiremos bordeando la costa cantábrica, sin salvar demasiados desniveles y adentrándonos ligeramente en el interior a la altura de Colunga, tras cruzar el río Libardón. Si hemos pernoctado en Ribadesella tan sólo deberemos cruzar por el puente de Arriondas y seguir a mano izquierda. Paralelos a la playa continuaremos por una zona residencial en el extrarradio de Ribadesella y por la aldea de Abeu.");  
        $manager->persist($etapa64);
        $manager->flush();
        $this->setReference(self::ETAPA . 65, $etapa64);
        
        $etapa65 = new Etapa();       
        $etapa65->setStart("Sebrayo");
        $etapa65->setFinish("Gijón");        
        $etapa65->setKm(35.8);
        $etapa65->setDescription("Salimos bien temprano por la mañana de Sebrayo siguiendo la carretera local que cruza esta localidad. Rápidamente nos ponemos bajo la autovía, la cual cruzamos bajo un puente y nada más pasarla giramos a la derecha. Un poco más adelante deberemos de volver a cruzarla pero en este caso por arriba. Salimos a la carretera nacional y accedemos al núcleo de Villaviciosa, conocida internacionalmente por la calidad de sus pumares (manzanos) y consecuentemente de su sidra.");  
        $manager->persist($etapa65);
        $manager->flush();
        $this->setReference(self::ETAPA . 66, $etapa65);
        
        $etapa66 = new Etapa();       
        $etapa66->setStart("Gijón");
        $etapa66->setFinish("Avilés");        
        $etapa66->setKm(25.4);
        $etapa66->setDescription("A través del monte Areo y sorteando varios ríos nos iremos aproximando a la ciudad de Avilés, cuyo casco histórico ha sido catalogado como zona de interés artístico y monumental. Además de la multitud de construcciones religiosas y civiles destaca por sus calles asoportaladas, por las que perderse y dejarse llevar por la belleza de sus edificios y vías adoquinadas. Además posee alguna de las playas más grandes de toda Asturias, como la del Sablón o la de Bayas y Salinas.");  
        $manager->persist($etapa66);
        $manager->flush();
        $this->setReference(self::ETAPA . 67, $etapa66);
        
        $etapa67 = new Etapa();       
        $etapa67->setStart("Avilés");
        $etapa67->setFinish("Muros de Nalón");        
        $etapa67->setKm(23.2);
        $etapa67->setDescription("Esta etapa podríamos incluso calificarla de rompepiernas ya que ascenderemos y descenderemos en multitud de ocasiones para salvar ríos, arroyos, autovías, acueductos, playas y multitud de aldeas y barrios. Salimos de Avilés en busca de una de sus playas más extensas, la de Salinas. Continuamos por la avenida de Alemania y ascendemos a San Cristobal. Al llegar a lo alto, tras apreciar las vistas, ponemos rumbo a ella, acercándonos más y más al mar Cantábrico por una senda a mano izquierda.");  
        $manager->persist($etapa67);
        $manager->flush();
        $this->setReference(self::ETAPA . 68, $etapa67);
        
        $etapa68 = new Etapa();       
        $etapa68->setStart("Muros de Nalón");
        $etapa68->setFinish("Soto de Luiña");        
        $etapa68->setKm(15.3);
        $etapa68->setDescription("El escaso kilometraje de esta etapa nos permitirá relajar un poco las piernas. Partimos de Muros desde su plaza principal en dirección a El Pito, por una carretera local y tras cruzar las vías del tren. No podemos omitir la visita a La Quinta de Selgas, conjunto palaciego rodeado de un basto jardín que conserva la esencia del proyecto original. Salimos de la localidad por asfalto, cambiando la carretera más adelante por una pista a mano izquierda que nos conducirá hacia el arroyo de San Roque.");  
        $manager->persist($etapa68);
        $manager->flush();
        $this->setReference(self::ETAPA . 69, $etapa68);
        
        $etapa69 = new Etapa();       
        $etapa69->setStart("Soto de Luiña");
        $etapa69->setFinish("Cadavedo");        
        $etapa69->setKm(18.5);
        $etapa69->setDescription("Esta etapa nos ofrece dos alternativas: seguir hasta Cadavedo por carretera o adentrarse en la Sierra de Palancas. Cadavedo o Cadavéu esconde bellos parajes, como la playa de la Ribeirona o la ermita de la Regalina, situada sobre un promontorio con unas espectaculares vistas. Desgraciadamente el trazado original por la Sierra de las Palancas no está acondicionado correctamente, existiendo zonas con maleza y caminos prácticamente intransitables.");  
        $manager->persist($etapa69);
        $manager->flush();
        $this->setReference(self::ETAPA . 70, $etapa69);
        
        $etapa70 = new Etapa();       
        $etapa70->setStart("Cadavedo");
        $etapa70->setFinish("Luarca");        
        $etapa70->setKm(15.3);
        $etapa70->setDescription("Dejamos la parroquia de Cadavedo por la carretera nacional hasta alcanzar la vía del tren, las cruzamos y unas flechas nos mostrarán el camino a seguir hacia Villademoros. Desde aquí salimos por una carretera local y cruzamos más adelante tras otro desvío el arroyo Palminero. Rápidamente nos colocamos en San Cristóbal y en la aledaña Querúas, alternando entre la N-632 y carreteras secundarias. El río Esva se interpondrá en nuestro camino y nos conducirá hasta la playa de Cueva.");  
        $manager->persist($etapa70);
        $manager->flush();
        $this->setReference(self::ETAPA . 71, $etapa70);
        
        $etapa71 = new Etapa();       
        $etapa71->setStart("Luarca");
        $etapa71->setFinish("La Caridad");        
        $etapa71->setKm(30.3);
        $etapa71->setDescription("Etapa monótona, alternando en todo momento tramos por carretera y caminos muy próximos a ella. Cruzaremos el río Navia, uno de los más importantes y caudalosos de la cornisa cantábrica y que nace en Pedrafita do Cebreiro. Dejamos atrás Luarca por la calle La Peña, cruzando el curso del río Negro y ascendiendo hasta la aldea de Villuir, punto donde cruzamos la carretera nacional y nos adentramos por caminos rurales hasta Otur, a unos tres kilómetros.");  
        $manager->persist($etapa71);
        $manager->flush();
        $this->setReference(self::ETAPA . 72, $etapa71);
        
        $etapa72 = new Etapa();       
        $etapa72->setStart("La Caridad");
        $etapa72->setFinish("Ribadeo");        
        $etapa72->setKm(21.6);
        $etapa72->setDescription("Nos despedimos de Asturias para darle una calurosa bienvenida a Ribadeo, primer concello gallego, tal y como nos indica la llave de su escudo, la cual simboliza la entrada a Galicia. Históricamente se accedía a la comunidad gallega por Vegadeo, un poco más al sur, pero la construcción del puente de los Santos entre Ribadeo y Castropol modificó sustancialmente esta ruta. Para los que prefieran seguir por la costa y visitar Tapia de Casariego también tendrán la oportunidad de hacerlo.");  
        $manager->persist($etapa72);
        $manager->flush();
        $this->setReference(self::ETAPA . 73, $etapa72);
        
        $etapa73 = new Etapa();       
        $etapa73->setStart("Ribadeo");
        $etapa73->setFinish("Lourenzá");        
        $etapa73->setKm(28.4);
        $etapa73->setDescription("El Camino del Norte comienza su andadura en Galicia desde la villa medieval de Ribadeo, localidad limítrofe entre la provincia de Lugo y Asturias. Su actividad ha estado muy ligada a su ría ya que esta supone también la entrada a Galicia desde la zona nororiental de la península. Esta primera etapa de casi treinta kilómetros es asequible para la mayoría de peregrinos, resaltando tan sólo los repechos en A Ponte Arante y la que da acceso a Lourenzá.");  
        $manager->persist($etapa73);
        $manager->flush();
        $this->setReference(self::ETAPA . 74, $etapa73);
        
        $etapa74 = new Etapa();       
        $etapa74->setStart("Lourenzá");
        $etapa74->setFinish("Abadín");        
        $etapa74->setKm(25.2);
        $etapa74->setDescription("Al contrario que en el día de ayer, hoy no transcurriremos por tantos pueblos y pequeñas aldeas, pero en cambio llegaremos a una de las siete antiguas capitales del Reino de Galicia: Mondoñedo. Las constantes subidas se verán compensadas por frondosos bosques y paisajes sin igual, hasta llegar al puerto de a Xesta, desde donde podremos apreciar unas espectaculares vistas de todo el valle.");  
        $manager->persist($etapa74);
        $manager->flush();
        $this->setReference(self::ETAPA . 75, $etapa74);
        
        $etapa75 = new Etapa();       
        $etapa75->setStart("Abadín");
        $etapa75->setFinish("Vilalba");        
        $etapa75->setKm(20.7);
        $etapa75->setDescription("Dejamos atrás Abadín partiendo de la oficina de Correos, donde a un kilómetro más adelante nos despediremos también de su iglesia en honor a Santa María. Etapa marcada por su perfil llano, como bien podemos deducir de la zona en la que nos encontramos: a Terra Chá (Tierra llana en castellano). Caminaremos entre infinitos prados verdes repletos de ganado pero siempre próximos a la carretera nacional, cuya presencia facilita la existencia de numerosos establecimientos a lo largo de la etapa.");  
        $manager->persist($etapa75);
        $manager->flush();
        $this->setReference(self::ETAPA . 76, $etapa75);
        
        $etapa76 = new Etapa();       
        $etapa76->setStart("Vilalba");
        $etapa76->setFinish("Baamonde");        
        $etapa76->setKm(18.6);
        $etapa76->setDescription("De nuevo el terreno llano facilita notablemente el desarrollo de esta etapa pero, sin embargo, el kilometraje de la misma (unos treinta y tres kilómetros hasta Miraz) sí puede dejar exhausto a más de un peregrino. Entre densos bosques y extensas praderas cruzaremos los ríos Magdalena y Trimaz, apreciando la belleza de la iglesia de San Alberte y varios puentes medievales.");  
        $manager->persist($etapa76);
        $manager->flush();
        $this->setReference(self::ETAPA . 77, $etapa76);
        
        $etapa77 = new Etapa();       
        $etapa77->setStart("Baamonde");
        $etapa77->setFinish("Sobrado");        
        $etapa77->setKm(39.8);
        $etapa77->setDescription("En esta etapa diremos adiós a las suaves ondulaciones de a Terra Chá para dar paso a la provincia de A Coruña. De nuevo pasaremos por innumerables pueblos, muchos de ellos casi despoblados con el paso de los años y la emigración del campo a la ciudad. Esto marcará la jornada de hoy por lo que no encontraremos muchos servicios, tan sólo la soledad y la tranquilidad del rural gallego hasta llegar a Sobrado dos Monxes y a su impresionante monasterio cisterciense.");  
        $manager->persist($etapa77);
        $manager->flush();
        $this->setReference(self::ETAPA . 78, $etapa77);
        
        $etapa78 = new Etapa();       
        $etapa78->setStart("Sobrado");
        $etapa78->setFinish("Arzúa");        
        $etapa78->setKm(22);
        $etapa78->setDescription("Aunque aún nos quedan tres etapas más para alcanzar la ciudad compostelana, esta es la última del Camino del Norte ya que en Arzúa nos juntaremos con la masa de peregrinos que vienen desde St.Jean Pied de Port o Roncesvalles, recorriendo el Camino Francés. Así que conviene disfrutar al máximo de esta última etapa, de la tranquilidad de los bosques atlánticos, los sosegados caminos rurales y la excelente gastronomía.");  
        $manager->persist($etapa78);
        $manager->flush();
        $this->setReference(self::ETAPA . 79, $etapa78);
        
        $etapa79 = new Etapa();       
        $etapa79->setStart("Arzúa");
        $etapa79->setFinish("Pedrouzo");        
        $etapa79->setKm(19.3);
        $etapa79->setDescription("Llegados a este punto, y a tan solo 40 kilómetros de entrar en la plaza del Obradoiro y contemplar nuestro destino, disponemos de varias opciones, siendo la más recomendable hacer noche en O Pedrouzo, dado que se trata de un lugar que dispone de todos los servicios necesarios y nos permite dejar una pequeña etapa para finalizar nuestro camino para el día siguiente. Es recomendable dividir la etapa en dos, y disfrutar de las dos últimas jornadas que nos restan para llegar a Compostela.");  
        $manager->persist($etapa79);
        $manager->flush();
        $this->setReference(self::ETAPA . 80, $etapa79);
        
        $etapa80 = new Etapa();       
        $etapa80->setStart("Pedrouzo");
        $etapa80->setFinish("Santiago de Compostela");        
        $etapa80->setKm(19.4);
        $etapa80->setDescription("Santiago aguarda y eso se nota en los caminantes. Algunos con paso ligero y con la mente puesta en la meta, otros sin embargo, con el paso sosegado de aquel que tiene miedo de llegar al final de su aventura y no saber lo que vendrá después. En cualquier caso, todos con la ilusión de alcanzar por fin la majestuosa plaza del Obradoiro y alzar la vista para vislumbrar la barroca fachada de la Catedral. Por delante, una etapa corta, sencilla, con pendientes moderadas y senderos agradecidos.");  
        $manager->persist($etapa80);
        $manager->flush();
        $this->setReference(self::ETAPA . 81, $etapa80);
        
        //Vía de la Plata
        
        $etapa81 = new Etapa();       
        $etapa81->setStart("Sevilla");
        $etapa81->setFinish("Guillena");        
        $etapa81->setKm(21.6);
        $etapa81->setDescription("La aventura de la Vía de la Plata, además de calzada romana, comienza a las puertas de la Catedral de Sevilla. Concretamente junto a la puerta de la Asunción, sita en la Avenida de la Constitución. La primera vieira nos guía por la calle García de Vinuesa y continuamos por las calles de Jimios, Zaragoza, Reyes Católicos. Cruzamos el Puente de Isabel II para acceder al popular barrio de Triana. Lo recorremos por las calles San Jorge, Callao y Castilla, donde se encuentra la Capilla del Cachorro.");  
        $manager->persist($etapa81);
        $manager->flush();
        $this->setReference(self::ETAPA . 82, $etapa81);
        
        $etapa82 = new Etapa();       
        $etapa82->setStart("Guillena");
        $etapa82->setFinish("Castiblanco de los Arroyos");        
        $etapa82->setKm(18.2);
        $etapa82->setDescription("Salimos de Guillena por la avenida de la Vega, a la derecha del albergue de peregrinos. A escasos quinientos metros torcemos a la derecha para ir en busca del río Rivera de Huelva, el cual cruzamos para desembocar más adelante en la autovía. Seguimos rumbo a un polígono industrial y accedemos a continuación a la Vía Pecuaria Cañada Real de las Islas. Este camino de trashumancia también conocido como la “vereda de la carne” discurre mayormente por el valle del Riopudio.");  
        $manager->persist($etapa82);
        $manager->flush();
        $this->setReference(self::ETAPA . 83, $etapa82);
        
        $etapa83 = new Etapa();       
        $etapa83->setStart("Castiblanco de los Arroyos");
        $etapa83->setFinish("Almadén de la Plata");        
        $etapa83->setKm(28.8);
        $etapa83->setDescription("Por la avenida Antonio Machado salimos de Almadén de La Plata en busca de la iglesia del Divino Salvador. Desde allí descendemos siguiendo las flechas amarillas hasta la carretera, la cual seguiremos durante la mayor parte de esta etapa. Aproximadamente dos kilómetros y medio después pasaremos por dos áreas residenciales periféricas de Castilblanco, dejándolas atrás para ascender entre campos repletos de ganado hasta otra carretera, justo a la altura de una gran antena de telecomunicaciones.");  
        $manager->persist($etapa83);
        $manager->flush();
        $this->setReference(self::ETAPA . 84, $etapa83);
        
        $etapa84 = new Etapa();       
        $etapa84->setStart("Almadén de la Plata");
        $etapa84->setFinish("Monesterio");        
        $etapa84->setKm(34.6);
        $etapa84->setDescription("En el día de hoy nos despediremos de la comunidad andaluza para adentrarnos en tierras extremeñas. Salimos de Almadén de la Plata por la plaza de toros, siguiendo las marcas amarillas jacobeas y descendiendo por el cerro de los Covachos a través de caminos de tierra. En estos casi treinta y cinco kilómetros caminaremos por extensas dehesas, campos de labradío y varios arroyos, teniendo que sufrir un poco al subir finalmente al puerto de la Cruz, paso previo a Monesterio.");  
        $manager->persist($etapa84);
        $manager->flush();
        $this->setReference(self::ETAPA . 85, $etapa84);
        
        $etapa85 = new Etapa();       
        $etapa85->setStart("Monesterio");
        $etapa85->setFinish("Fuente de Cantos");        
        $etapa85->setKm(20.7);
        $etapa85->setDescription("Desde Monesterio iremos descendiendo progresivamente hasta alcanzar el punto más bajo de esta etapa, el arroyo Bodión. Desde allí tendremos que llanear por multitud de pistas agrarias y campos de cultivo hasta Fuente de Cantos, localidad que vio nacer al pintor Francisco de Zurbarán y punto final de esta etapa. Esta etapa se caracteriza por la presencia de extensas llanuras e infinitas pistas agrícolas sin cobijo alguno.");  
        $manager->persist($etapa85);
        $manager->flush();
        $this->setReference(self::ETAPA . 86, $etapa85);
        
        $etapa86 = new Etapa();       
        $etapa86->setStart("Fuente de Cantos");
        $etapa86->setFinish("Zafra");        
        $etapa86->setKm(24.2);
        $etapa86->setDescription("Siguiendo con la tónica de la jornada anterior recorreremos estos casi veinticinco kilómetros entre pistas y arroyos. Atravesaremos pequeños núcleos antes de llegar a Zafra, punto estratégico que une varias ciudades de la comunidad extremeña, como Badajoz, Mérida, Sevilla, Huelva y Córdoba. El paisaje será el habitual, pistas agrarias,viñedos y la presencia de varios arroyos que tendremos que ir superando.");  
        $manager->persist($etapa86);
        $manager->flush();
        $this->setReference(self::ETAPA . 87, $etapa86);
        
        $etapa87 = new Etapa();       
        $etapa87->setStart("Zafra");
        $etapa87->setFinish("Villafranca de los Barros");        
        $etapa87->setKm(19.8);
        $etapa87->setDescription("Comenzamos desde Zafra por la Torre de San Francisco, punto en el que cruzamos la carretera y cogemos un camino ascendente hasta la Sierra de San Cristóbal, al sur de Los Santos de Maimona. En estos montes se cultivan vides, olivares, almendros y multitud de árboles frutales gracias al clima suave predominante. Entramos así en la localidad del mismo nombre, en la cual debemos abastecernos para el resto de la etapa ya que no encontraremos servicio alguno hasta llegar a Villafranca de los Barros.");  
        $manager->persist($etapa87);
        $manager->flush();
        $this->setReference(self::ETAPA . 88, $etapa87);
        
        $etapa88 = new Etapa();       
        $etapa88->setStart("Villafranca de los Barros");
        $etapa88->setFinish("Torremejía");        
        $etapa88->setKm(27);
        $etapa88->setDescription("Desde Villafranca de los Barros iniciaremos esta octava jornada con la mirada puesta en la Vereda de la Mina, tras cruzar el arroyo de Bonhabal y punto de inflexión de esta etapa. Desde allí podremos desviarnos hasta Almendralejo, reuniéndonos así con el resto de peregrinos, que en el día de ayer alargaron la etapa, o seguir de frente hasta Torremejía. Esta localidad fue la elegida por Camilo José Cela para ambientar su novela La familia de Pascual Duarte.");  
        $manager->persist($etapa88);
        $manager->flush();
        $this->setReference(self::ETAPA . 89, $etapa88);
        
        $etapa89 = new Etapa();       
        $etapa89->setStart("Torremejía");
        $etapa89->setFinish("Mérida");        
        $etapa89->setKm(15.3);
        $etapa89->setDescription("Apenas dieciséis kilómetros separan Torremejía de Mérida, sin embargo, los que hayan pernoctado en la etapa anterior en Almendralejo tendrán que recorrer una distancia total de casi treinta kilómetros. El río Guadiana nos da la bienvenida a la ciudad fundada por el emperador Octavio Augusto y que sirvió como ciudad de retiro para los soldados eméritos o veteranos y la cual llegó incluso a ser la capital del Reino Visigodo de Hispania.");  
        $manager->persist($etapa89);
        $manager->flush();
        $this->setReference(self::ETAPA . 90, $etapa89);
        
        $etapa90 = new Etapa();       
        $etapa90->setStart("Mérida");
        $etapa90->setFinish("Alcuéscar");        
        $etapa90->setKm(35.9);
        $etapa90->setDescription("Nos despedimos de la ciudad de Octavio Augusto sobre su arroyo Albarregas, rumbo al embalse de Proserpina. Para ello nos adentramos en la avenida Vía de la Plata para desviarnos por la avenida del Lago tras una glorieta. Cruzando el Parque Natural de Cornalvo diremos adiós a la provincia de Badajoz para adentrarnos en tierras cacereñas. Tendremos que traspasar el embalse romano de Proserpina, el cual también forma parte del declarado Patrimonio de la Humanidad Conjunto Arqueológico de Mérida.");  
        $manager->persist($etapa90);
        $manager->flush();
        $this->setReference(self::ETAPA . 91, $etapa90);
        
        $etapa91 = new Etapa();       
        $etapa91->setStart("Alcuéscar");
        $etapa91->setFinish("Cáceres");        
        $etapa91->setKm(37.4);
        $etapa91->setDescription("Etapa que puede dividirse en dos, pernoctando en la Aldea del Cano o en Valdesalor,para aquellos que deseen llegar temprano a Cáceres y visitar la ciudad. A pesar de ser casi cuarenta kilómetros la distancia entre Alcuéscar y el fin de etapa cabe resaltar que los desniveles no son muy grandes por lo que para los que se vean con fuerzas podrán ahorrar un día de viaje y visitar Cáceres al día siguiente.");  
        $manager->persist($etapa91);
        $manager->flush();
        $this->setReference(self::ETAPA . 92, $etapa91);

        /*otro camino
        $etapa = new Etapa();       
        $etapa->setStart("");
        $etapa->setFinish("");        
        $etapa->setKm();
        $etapa->setDescription("");  
        $manager->persist($etapa);
        $manager->flush();*/        
       
    }
}

