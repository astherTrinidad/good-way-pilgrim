<?php

namespace App\DataFixtures;

use App\Entity\Etapa;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EtapaDataFixtures extends Fixture
{    
    public const ETAPAS = array();

    public function load(ObjectManager $manager)
    {          
       //camino frances
        $etapa = new Etapa();       
        $etapa->setStart("Saint Jean Pied de Port");
        $etapa->setFinish("Roncesvalles");        
        $etapa->setKm(24.2);
        $etapa->setDescription("Saint Jean Pied de Port es el segundo punto de partida más empleado para iniciar su andadura. Antigua ciudad, amurallada y rodeada de majestuosas montañas.La jornada inaugural reta al peregrino con un desnivel de más de 1250 metros que enlazan St.Jean Pied de Port con el Puerto de Lepoeder, la entrada a territorio español conocida como la ruta de Napoleón.");  
        $manager->persist($etapa);
        $manager->flush();
        ETAPAS_push($etapa);
               
        $etapa1 = new Etapa();       
        $etapa1->setStart("Roncesvalles");
        $etapa1->setFinish("Zubiri");        
        $etapa1->setKm(21.4);
        $etapa1->setDescription("El camino se inicia atravesando el bosque de Sorginaritzaga o Robedal de las Brujas. Un hermoso bosque de hayas, robles y tréboles junto con lo bucólico del río Arga, en nuestra llegada a Zubiri, serán los grandes regalos de la jornada.");  
        $manager->persist($etapa1);
        $manager->flush();
        ETAPAS_push($etapa1);
                
        $etapa2 = new Etapa();       
        $etapa2->setStart("Zubiri");
        $etapa2->setFinish("Pamplona");        
        $etapa2->setKm(20.4);
        $etapa2->setDescription("Comenzaremos la jornada cruzando el Puente de la Rabia. En lo alto de Akerreta, se ubica la iglesia de la Transfiguración en la que observaremos elementos medievales. Abandonaremos Zuriain siguiendo la carretera N-135 y volvemos a cruzar el río Arga por el puente de Iturgaiz. En la ruta de Huarte y retomaremos la senda tradicional a la altura de Trinidad de Arre. Siguiendo las señales del Camino de Santiago avanzaremos hasta el puente de la Magadalena dando acceso al casco antiguo de Pamplona.");  
        $manager->persist($etapa2);
        $manager->flush();
        ETAPAS_push($etapa2);

        $etapa3 = new Etapa();       
        $etapa3->setStart("Pamplona");
        $etapa3->setFinish("Puente de la Reina");        
        $etapa3->setKm(23.9);
        $etapa3->setDescription("Descendemos la calle Curia a Mercaderes. Seguimos por la calle San Saturnino atravesando la calle Mayor. Cruzamos el puente de Acella que atraviesa el río Sadar. Tras dos kilómetros en la entrada de Cizur Menor veremos a la derecha un antiguo señorío despoblado. Subiendo estará el templo geométrico de San Andrés en Zariquiegui. En lo alto del Perdón descenderemos y atravesamos el arco puntado de la puerta de Obanos, seguimos la vega del río Robo hasta el Puente la Reina.");  
        $manager->persist($etapa3);
        $manager->flush($etapa3);
        ETAPAS_push($etapa3);

        $etapa4 = new Etapa();       
        $etapa4->setStart("Puente de la Reina");
        $etapa4->setFinish("Estella");        
        $etapa4->setKm(21.6);
        $etapa4->setDescription("Atravesamos el arco que une la iglesia del Crucifijo con el convento de San Juan y accedemos a la calle Mayor. Llegamos a Zubiurrutia donde se ubica el convento de las Comendadoras del Sancti Spiritus. Avanzamos por el margen derecho del río Arga hasta Mañeru. A la salida, un camino rodeado de cereal y viñedos discurre hasta un pueblo medieval en lo alto de una colina, Ciraqui. Descendemos hasta llegar a la regata Dorrondoa. En Lorca seguimos a cruz de Maurien y nos dirigimos a Villatuerta.");  
        $manager->persist($etapa4);
        $manager->flush(); 
        ETAPAS_push($etapa4);

        $etapa5 = new Etapa();       
        $etapa5->setStart("Estella");
        $etapa5->setFinish("Los Arcos");        
        $etapa5->setKm(21.3);
        $etapa5->setDescription("Abandonamos la localidad por las calles de la Rúa y San Nicolás, pasando junto al Palacio de los reyes de Navarra. Salimos a la calle Zalatambor y continuamos de frente después de la rotonda. Al pasar la gasolinera nos desviaremos a mano derecha hasta Ayegui. La ruta desciende hasta la fuente del Vino y el Monasterio de Irache. Cruzaremos la carretera N-111. Un conducto subterráneo nos permitirá acceder a campos de cultivo hasta Ázqueta. Junto a la senda encontramos Villamayor de Monjardín.");  
        $manager->persist($etapa5);
        $manager->flush($etapa5);
        ETAPAS_push($etapa5);

        $etapa6 = new Etapa();       
        $etapa6->setStart("Los Arcos");
        $etapa6->setFinish("Logroño");        
        $etapa6->setKm(27.6);
        $etapa6->setDescription("En esta etapa del Camino de Santiago nos despedimos de Navarra para adentrarnos en La Rioja, tierra de vinos. A lo largo de la jornada de hoy saldrá a nuestro paso uno de los ríos más importantes de la península ibérica, el caudaloso y largo río Ebro. El recorrido de hoy finaliza en Logroño pero antes tendremos que salvar algunos desniveles.");  
        $manager->persist($etapa6);
        $manager->flush();

        $etapa7 = new Etapa();       
        $etapa7->setStart("Logroño");
        $etapa7->setFinish("Nájera");        
        $etapa7->setKm(29);
        $etapa7->setDescription("A pesar de tratarse de una etapa de casi treinta kilómetros no albergará dificultad alguna para la mayoría de peregrinos. Caminaremos sobre pendientes de carácter moderado, rodeados de viñedos y árboles coloridos llenos de fruta. Cruzaremos por multitud de pueblos vinculados al Camino, para alcanzar el municipio de Nájera, denominación heredada de los árabes, Náxara, que significa “lugar entre peñas” o “lugar al mediodía”.");  
        $manager->persist($etapa7);
        $manager->flush();

        $etapa8 = new Etapa();       
        $etapa8->setStart("Nájera");
        $etapa8->setFinish("Santo Domingo de La Calzada");        
        $etapa8->setKm(20.7);
        $etapa8->setDescription("Nos ponemos en marcha para dirigirnos hacia la siguiente localidad mágica del Camino: Santo Domingo de la Calzada, donde según la leyenda se obró el milagro del gallo y la gallina. Esta novena etapa discurre entre extensos campos de cereal y zonas agrícolas, y es junto con la anterior, una de las más largas del Camino Francés. Pero esto no supondrá un problema para los ya experimentados peregrinos, porque la ruta jacobea nos recompensará con bellos paisajes y de nuevo mágicas historias.");  
        $manager->persist($etapa8);
        $manager->flush();

        $etapa9 = new Etapa();       
        $etapa9->setStart("Santo Domingo de La Calzada");
        $etapa9->setFinish("Belorado");        
        $etapa9->setKm(22.0);
        $etapa9->setDescription("Será en esta etapa cuando dejaremos atrás los viñedos de La Rioja para dar paso a los extensos campos de cereal de Castilla y León. Al igual que en el día de ayer, no tendremos que salvar grandes desniveles, pero sí que algún que otro cruce peligroso por carretera. Cruzaremos por varios pueblos bien abastecidos que nacieron a la vera del Camino para llegar a Belorado, al abrigo de la Sierra de la Demanda.");  
        $manager->persist($etapa9);
        $manager->flush();

        $etapa10 = new Etapa();       
        $etapa10->setStart("Belorado");
        $etapa10->setFinish("San Juan de Ortega");        
        $etapa10->setKm(23.9);
        $etapa10->setDescription("El día de hoy transcurrirá entre paisajes de montaña y solitarios caminos donde poder desconectar y abandonar a nuestros pensamientos. Podemos dividir esta etapa en dos diferenciadas partes, la primera transcurre sin apenas repechos entre pequeños pueblos típicos del Camino, y la segunda comienza en Villafranca, desde donde tendremos que ascender a los Montes de Oca. Tan sólo los árboles y el murmullo del viento nos acompañarán en este tramo con vistas ya a San Juan de Ortega.");  
        $manager->persist($etapa10);
        $manager->flush();

        $etapa11 = new Etapa();       
        $etapa11->setStart("San Juan de Ortega");
        $etapa11->setFinish("Burgos");        
        $etapa11->setKm(25.8);
        $etapa11->setDescription("En esta etapa de algo más de veinticinco kilómetros transcurriremos por terreno prácticamente llano, típico de las tierras de Castilla. El trazado original no cruza Atapuerca pero aquellos peregrinos que deseen visitar los yacimientos tienen a su disposición una variante señalizada. De la misma manera, para evitar el último tramo industrial que da acceso a Burgos, también podremos desviarnos por un paseo fluvial para luego enlazar con la ruta tradicional en la ciudad bañada por el río Arlanzón.");  
        $manager->persist($etapa11);
        $manager->flush();

        $etapa12 = new Etapa();       
        $etapa12->setStart("Burgos");
        $etapa12->setFinish("Hornillos del Camino");        
        $etapa12->setKm(21.0);
        $etapa12->setDescription("Nos adentraremos de lleno en el paisaje castellano, con grandes llanuras y campos de cereal. El clima será extremo; si viajamos en verano las altas temperaturas y la ausencia de sombras donde resguardarnos pondrán a prueba nuestras cantimploras; en invierno, las fuertes ventiscas y nevadas impedirán que entremos en calor, ni tras haber recorrido algo más de treinta kilómetros. El encanto de los pueblos medievales que recorreremos nos devolverán la magia y el encanto de esta ruta milenaria.");  
        $manager->persist($etapa12);
        $manager->flush();

        $etapa13 = new Etapa();       
        $etapa13->setStart("Hornillos del Camino");
        $etapa13->setFinish("Castrojeriz");        
        $etapa13->setKm(19.9);
        $etapa13->setDescription("Abandonaremos Hornillos del Camino entre sendas interminables y la única sombra de nuestra mochila. Unos cinco kilómetros después, una cruz de Santiago nos animará a continuar hacia San Bol, localidad por donde no discurre la ruta pero cuyo desvío está a escasos metros. Si proseguimos, ascenderemos por una senda pedregosa, cruzaremos una carretera y nos internaremos en un sendero que nos llevará a Hontanas, oculta entre valles. Tras una pequeña parada, dejamos esta localidad por su calle Mayor.");  
        $manager->persist($etapa13);
        $manager->flush();

        $etapa14 = new Etapa();       
        $etapa14->setStart("Castrojeriz");
        $etapa14->setFinish("Frómista");        
        $etapa14->setKm(24.7);
        $etapa14->setDescription("El mayor desafío de esta etapa se encuentra en la subida al Alto de Mostelares, a partir del cual ya podremos escuchar el murmullo del Pisuerga, presagiando la cercanía de la siguiente gran ciudad: Palencia. Pero antes de llegar a ella aún haremos una parada en Frómista, localidad íntimamente ligada al Camino albergando por lo tanto un amplio patrimonio histórico destacando la iglesia de San Martín, uno de los templos románicos mejor conservados y completos de toda Europa.");  
        $manager->persist($etapa14);
        $manager->flush();

        $etapa15 = new Etapa();       
        $etapa15->setStart("Frómista");
        $etapa15->setFinish("Carrión de los Condes");        
        $etapa15->setKm(18.8);
        $etapa15->setDescription("Día relajado, algo menos de veinte kilómetros separan Frómista de Carrión de los Condes. Esta etapa, de perfil claramente llano, se caracteriza por las monótonas llanuras castellanas, salpicadas por una sucesión de pueblos típicos del Camino donde podrás descansar a la sombra de monumentos de gran belleza y tradición jacobea.");  
        $manager->persist($etapa15);
        $manager->flush();

        $etapa16 = new Etapa();       
        $etapa16->setStart("Carrión de los Condes");
        $etapa16->setFinish("Terradillos de los Templarios");        
        $etapa16->setKm(26.3);
        $etapa16->setDescription("Esta etapa no supone un gran desafío en cuanto a la orografía pero sí en cuanto a su longitud y a la ausencia de servicios durante algo más de diez kilómetros. Tampoco pasaremos por demasiados pueblos por lo que es necesario ir bien cargados de agua, sobre todo en verano. De nuevo, las interminables rectas entre campos de cereal nos harán el trayecto algo monótono pero a cambio, caminaremos por la mismísima Vía Aquitania, antigua calzada romana que enlazaba Burdeos con Astorga.");  
        $manager->persist($etapa16);
        $manager->flush();

        $etapa17 = new Etapa();       
        $etapa17->setStart("Terradillos de los Templarios");
        $etapa17->setFinish("Bercianos del Real Camino");        
        $etapa17->setKm(23.2);
        $etapa17->setDescription("Palencia nos da paso ya a la provincia de León, por la cual discurre la mayor parte del Camino Francés, nada más y nada menos que doscientos quince kilómetros. Tras superar Sahagún el Camino se bifurca, ofreciéndonos dos alternativas para llegar finalmente a El Burgo Ranero, parando previamente en Bercianos del Real Camino.");  
        $manager->persist($etapa17);
        $manager->flush();

        $etapa18 = new Etapa();       
        $etapa18->setStart("Bercianos del Real Camino");
        $etapa18->setFinish("Mansilla de las Mulas");        
        $etapa18->setKm(26.3);
        $etapa18->setDescription("Al igual que en algunas de las etapas anteriores, tendremos que avanzar durante bastantes kilómetros sin toparnos con población alguna, por lo que deberemos aprovisionarnos correctamente antes de partir. Mansilla de las Mulas, a pesar de ser una población de apenas unos dos mil habitantes, consta de todos los servicios necesarios para pernoctar en ella, por lo que es la localidad perfecta para finalizar la etapa y disfrutar a orillas del río Esla.");  
        $manager->persist($etapa18);
        $manager->flush();

        $etapa19 = new Etapa();       
        $etapa19->setStart("Mansilla de las Mulas");
        $etapa19->setFinish("León");        
        $etapa19->setKm(18.5);
        $etapa19->setDescription("En algo menos de veinte kilómetros desde Mansilla de las Mulas alcanzaremos la majestuosa capital del antiguo reino de León con su imponente catedral como símbolo de identidad. Entre medias cambiaremos el Esla por el Porma y el Torío, aproximándonos a León por el barrio periférico de Puente Castro.");  
        $manager->persist($etapa19);
        $manager->flush();

        $etapa20 = new Etapa();       
        $etapa20->setStart("León");
        $etapa20->setFinish("San Martín del Camino");        
        $etapa20->setKm(24.6);
        $etapa20->setDescription("Dejamos atrás la gran ciudad para adentrarnos de nuevo en la llanura castellana y los campos de trigo. Tendremos que elegir entre dos variantes, una que discurre por Villar de Matarife y la otra que sigue los pasos de trazado histórico hasta San Martín del Camino.");  
        $manager->persist($etapa20);
        $manager->flush();

        $etapa21 = new Etapa();       
        $etapa21->setStart("San Martín del Camino");
        $etapa21->setFinish("Astorga");        
        $etapa21->setKm(23.7);
        $etapa21->setDescription("Tras dos etapas marcadas por la presencia del asfalto, en el día de hoy diremos adiós a la pista paralela a la N-120 para dar paso a un paisaje agrícola con pendientes cortas pero pronunciadas. De nuevo, tendremos la posibilidad de elegir una de las dos variantes existentes, con el punto de mira en Astorga, llena de vestigios romanos como sus famosas termas, edificios medievales y casas modernistas. Esta pequeña ciudad sirve también de enlace entre el Camino Francés y la Vía de la Plata.");  
        $manager->persist($etapa21);
        $manager->flush();

        $etapa22 = new Etapa();       
        $etapa22->setStart("Astorga");
        $etapa22->setFinish("Foncebadón");        
        $etapa22->setKm(25.8);
        $etapa22->setDescription("Dejamos atrás la capital de la maragatería para afrontar una nueva etapa con dos partes bien diferenciadas. Los primeros kilómetros supondrán una sucesión de pueblos típicos de la llanura castellana, enmarcados todos ellos dentro del antiguamente conocido como País de los Maragatos o la Somoza. Caminaremos entre construcciones de sillarejo y vestigios de los antiguos arrieros, aquellos que se encargaban de transportar mercancías a lo largo y ancho de la península con ayuda de animales de carga.");  
        $manager->persist($etapa22);
        $manager->flush();

        $etapa23 = new Etapa();       
        $etapa23->setStart("Foncebadón");
        $etapa23->setFinish("Ponferrada");        
        $etapa23->setKm(26.8);
        $etapa23->setDescription("Ascenderemos a una de las cimas más elevadas de este trazado jacobeo, la cruz de Ferro en el monte Irago, desde donde emprenderemos un acusado descenso hasta llegar a Ponferrada. Decimos adiós a las extensas e inhóspitas llanuras castellanas para ser recibidos por los montes del Bierzo y su prolífica vegetación, la cual nos acompañará en una de las etapas más duras para nuestras piernas.");  
        $manager->persist($etapa23);
        $manager->flush();

        $etapa24 = new Etapa();       
        $etapa24->setStart("Ponferrada");
        $etapa24->setFinish("Villafranca");        
        $etapa24->setKm(24.2);
        $etapa24->setDescription("Quizá aún no nos estamos percatando, dada la presencia de las montañas del Bierzo resguardándonos del clima propiamente atlántico, pero nos estamos aproximando a Galicia. Poco a poco iremos dejando atrás las interminables rectas entre llanuras secas y monótonas, para dar paso a las vides y a la exuberante vegetación. Recorreremos pueblos bañados por la historia jacobea para acercarnos a la histórica Villafranca del Bierzo.");  
        $manager->persist($etapa24);
        $manager->flush();

        $etapa25 = new Etapa();       
        $etapa25->setStart("Villafranca");
        $etapa25->setFinish("O Cebreriro");        
        $etapa25->setKm(27.8);
        $etapa25->setDescription("Ya nos separan menos de doscientos kilómetros de Santiago de Compostela y en el día de hoy abriremos las puertas de Galicia, concretamente a través del puerto de montaña de O Cebreiro, asentamiento prerrománico donde asomarnos a la comunidad gallega desde sus famosas pallozas. Muchos peregrinos optan por comenzar aquí su andadura, dada la importancia de este lugar y la belleza del mismo, un lugar que desde luego no dejará indiferente a nadie.");  
        $manager->persist($etapa25);
        $manager->flush();

        $etapa26 = new Etapa();       
        $etapa26->setStart("O Cebreriro");
        $etapa26->setFinish("Triacastela");        
        $etapa26->setKm(20.8);
        $etapa26->setDescription("Tras la dura etapa de ayer hoy se nos presentan poco más de veinte kilómetros entre las sierra de O Courel y Os Ancares. Podremos respirar el aire más puro entre extensos y profundos valles repletos de castaños, robles, acebos, fresnos, etc, así como de la arquitectura y costumbres heredadas de la cultura castreña, una de las más antiguas de toda Europa. Descenderemos entre este bello paisaje hasta el valle que acoge a Triacastela, bajo la atenta mirada del monte Oribio.");  
        $manager->persist($etapa26);
        $manager->flush();

        $etapa27 = new Etapa();       
        $etapa27->setStart("Triacastela");
        $etapa27->setFinish("Sarria");        
        $etapa27->setKm(17.8);
        $etapa27->setDescription("Para afrontar esta etapa disponemos de dos variantes diferenciadas para alcanzar Sarria, una que transcurre por la localidad de San Xil y que es la que defienden muchos por ser la original y otra que transcurre por Samos, siendo una opción secundaria y que cuenta por tanto con algún inconveniente, como es el caso de grandes tramos por asfalto que son compensados a nuestro paso por Samos donde podemos disfrutar del maravilloso monasterio que se esconde en este lugar.");  
        $manager->persist($etapa27);
        $manager->flush();

        $etapa28 = new Etapa();       
        $etapa28->setStart("Sarria");
        $etapa28->setFinish("Portomarín");        
        $etapa28->setKm(22.2);
        $etapa28->setDescription("La etapa nos deparará una caminata agradecida, separada de carreteras de asfalto y abrazada a la Galicia más rural, donde disfrutaremos del campo y las pequeñas aldeas de los Concellos de Sarria, Paradela y Portomarín, además de cruzar ríos sobre puentes medievales y descubrir numerosos vestigios eclesiásticos de la época romana. Se trata de una etapa sencilla, con numerosos puntos de avituallamiento y una longitud moderada que no esconde desniveles pronunciados.");  
        $manager->persist($etapa28);
        $manager->flush();

        $etapa29 = new Etapa();       
        $etapa29->setStart("Portomarín");
        $etapa29->setFinish("Palas de Rei");        
        $etapa29->setKm(24.8);
        $etapa29->setDescription("Una etapa que transcurre por mucho asfalto, fraccionada por la sierra de Ligonde, división natural de las cuencas de los ríos Miño y Ulloa. Numerosas iglesias románicas, el cruceiro de Os Lameiros o los yacimientos de Castromaior. A priori, se trata de una etapa sin mayores complicaciones, pero en algunas ocasiones deberemos afrontar pequeñas subidas que pueden hacerse muy “cuesta arriba” en función de las fuerzas que tengamos acumuladas a la hora de emprender el ascenso.");  
        $manager->persist($etapa29);
        $manager->flush();

        $etapa30 = new Etapa();       
        $etapa30->setStart("Palas de Rei");
        $etapa30->setFinish("Arzúa");        
        $etapa30->setKm(28.5);
        $etapa30->setDescription("En esta etapa se abandona la provincia de Lugo para adentrarse en la provincia de A Coruña, donde se adentra a través de la aldea de O Coto, límite fronterizo entre ambas provincias. Una etapa exigente donde son frecuentes las subidas cortas pero dificultosas, en la que conviven tramos en un estado de conservación excepcional que atraviesan aldeas maravillosas de la Galicia profunda, con zonas menos gratificantes como polígonos industriales o tramos con un estado de conservación muy mejorable.");  
        $manager->persist($etapa30);
        $manager->flush();

        $etapa31 = new Etapa();       
        $etapa31->setStart("Arzúa");
        $etapa31->setFinish("Pedrouzo");        
        $etapa31->setKm(19.3);
        $etapa31->setDescription("Llegados a este punto, y a tan solo 40 kilómetros de entrar en la plaza del Obradoiro y contemplar nuestro destino, disponemos de varias opciones, siendo la más recomendable hacer noche en O Pedrouzo, dado que se trata de un lugar que dispone de todos los servicios necesarios y nos permite dejar una pequeña etapa para finalizar nuestro camino para el día siguiente. Es recomendable dividir la etapa en dos, y disfrutar de las dos últimas jornadas que nos restan para llegar a Compostela.");  
        $manager->persist($etapa31);
        $manager->flush();

        $etapa32 = new Etapa();       
        $etapa32->setStart("Pedrouzo");
        $etapa32->setFinish("Santiago de Compostela");        
        $etapa32->setKm(19.4);
        $etapa32->setDescription("Santiago aguarda y eso se nota en los caminantes. Algunos con paso ligero y con la mente puesta en la meta, otros sin embargo, con el paso sosegado de aquel que tiene miedo de llegar al final de su aventura y no saber lo que vendrá después. En cualquier caso, todos con la ilusión de alcanzar por fin la majestuosa plaza del Obradoiro y alzar la vista para vislumbrar la barroca fachada de la Catedral. Por delante, una etapa corta, sencilla, con pendientes moderadas y senderos agradecidos.");  
        $manager->persist($etapa32);
        $manager->flush();

        //primitivo
        $etapa33 = new Etapa();       
        $etapa33->setStart("Oviedo");
        $etapa33->setFinish("San Juan de Villapañada");        
        $etapa33->setKm(27);
        $etapa33->setDescription("Iniciaremos el Camino en el centro de Oviedo desde la Catedral de El Salvador en dirección al oeste fuera de la ciudad. Después pasaremos por la capilla de El Carmen en Lampajúa y continuaremos hasta Ponte de Gallegos.");  
        $manager->persist($etapa33);
        $manager->flush();

        $etapa34 = new Etapa();       
        $etapa34->setStart("San Juan de Villapañada");
        $etapa34->setFinish("Salas");        
        $etapa34->setKm(18.2);
        $etapa34->setDescription("Empezaremos el día con una pequeña subida de 5 kilómetros hasta llegar a Alto del Fresno. Los siguientes kilómetros de la etapa son más fáciles, descenderemos por pequeños pueblos y tierras de cultivo montañas y pasaremos por el monasterio de San Savaldor. Es recomendable visitar una visita al monasterio de San Salvador. A partir de Cornellana podremos ver muchos graneros típicos de la región de Asturias hasta finalmente llegar a Salas.");  
        $manager->persist($etapa34);
        $manager->flush();

        $etapa35 = new Etapa();       
        $etapa35->setStart("Salas");
        $etapa35->setFinish("Tineo");        
        $etapa35->setKm(19.8);
        $etapa35->setDescription("Esta es una de las etapas más cortas del Camino Primitivo pero también es una de las más dificultes debido a la cantidad de subidas que hay que realizar, estas subidas se concentran principalmente en los primeros kilómetros de la etapa.");  
        $manager->persist($etapa35);
        $manager->flush();

        $etapa36 = new Etapa();       
        $etapa36->setStart("Tineo");
        $etapa36->setFinish("Pola de Allande");        
        $etapa36->setKm(26.4);
        $etapa36->setDescription("Como si de una montaña rusa se tratase en esta etapa ascenderemos y descenderemos en multitud de ocasiones a través de valles y bosques bañados por el agua de los ríos asturianos. Atravesaremos encantadores bosques así como el bonito pueblo de Vega de Rey. La última parte de la etapa implica un importante descenso de 300 metros hasta llegar a Pola de Allende.Esta parroquia también destaca por la presencia en lo alto de una colina del Palacio de Cienfuegos.");  
        $manager->persist($etapa36);
        $manager->flush();

        $etapa37 = new Etapa();       
        $etapa37->setStart("Pola de Allande");
        $etapa37->setFinish("La Mesa");        
        $etapa37->setKm(21.6);
        $etapa37->setDescription("Esta etapa está considerada una de las más bellas de esta ruta Primitiva, ya que corona el alto del Puerto, puerto de montaña a algo más de mil metros de altitud y desde donde se pueden apreciar unas espectaculares vistas del valle del río Nisón y las cercanas montañas de Lugo. Sin embargo esta recompensa no será gratuita ya que tendremos que sufrir pendientes positivas de alrededor del cinco por ciento en muchos casos.");  
        $manager->persist($etapa37);
        $manager->flush();

        $etapa38 = new Etapa();       
        $etapa38->setStart("La Mesa");
        $etapa38->setFinish("Grandas de Salime");        
        $etapa38->setKm(15.2);
        $etapa38->setDescription("De carácter principalmente descendente nos dirigiremos hacia el embalse de Salime, bañado por las aguas del río Navia. La construcción de este embalse cambió por completo la orografía y fisionomía de la zona, siendo necesario inundar varias zonas habitadas y numerosas iglesias y cementerios. Tras cruzar la presa iniciaremos una ruta ascendente, lenta pero constante, para llegar hasta Grandas de Salime, último tramo asturiano de esta ruta jacobea.");  
        $manager->persist($etapa38);
        $manager->flush();

        $etapa39 = new Etapa();       
        $etapa39->setStart("Grandas de Salime");
        $etapa39->setFinish("A Fonsagrada");        
        $etapa39->setKm(25.2);
        $etapa39->setDescription("Entraremos en en la provincia de Lugo y en el lugar de Acebo. Este es el punto de partida elegido por los peregrinos que optan por realizar sólo la parte del camino primitivo que discurre por Galicia. Conviene resaltar que a partir de aquí, no sólo cambiamos de comunidad sino también de indicaciones. En Asturias las famosas vieiras o conchas señalizaban el camino a seguir por su parte estrecha mientras que en las tierras del apóstol debemos guiarnos por la parte abierta de las mismas.");  
        $manager->persist($etapa39);
        $manager->flush();

        $etapa40 = new Etapa();       
        $etapa40->setStart("A Fonsagrada");
        $etapa40->setFinish("O Cádavo Baleira");        
        $etapa40->setKm(24.3);
        $etapa40->setDescription("A pesar de la dureza de la jornada de hoy disfrutaremos enormemente de las vistas y de caminos donde tan sólo nos acompañarán extensos pinares y la exuberante vegetación de los bosques gallegos. El descenso desde el Hospital de Montouto pondrá a prueba nuestras rodillas, así como los sucesivos toboganes por los que tendremos que discurrir para alcanzar O Cádavo, en la provincia de Lugo. Acabaremos en O Cádavo dotada de albergue y todos los establecimientos que pudiésemos necesitar.");  
        $manager->persist($etapa40);
        $manager->flush();

        $etapa41 = new Etapa();       
        $etapa41->setStart("O Cádavo Baleira");
        $etapa41->setFinish("Lugo");        
        $etapa41->setKm(29.5);
        $etapa41->setDescription("Retomamos el camino partiendo del albergue de O Cádavo en dirección al centro del pueblo, concretamente a la plaza situada detrás de la casa consistorial. Algo más de treinta kilómetros nos separan de la urbe romana amurallada de Lugo, distancia que recorreremos ansiosos para alcanzar esta gran ciudad. Pero esto no debe distraernos ya que entre medias degustaremos la belleza del rural gallego, con multitud de pequeñas aldeas y restos arqueológicos con mil historias que contar.");  
        $manager->persist($etapa41);
        $manager->flush();

        $etapa42 = new Etapa();       
        $etapa42->setStart("Lugo");
        $etapa42->setFinish("San Romao");        
        $etapa42->setKm(19.6);
        $etapa42->setDescription("Alternando asfalto con caminos rurales saldremos de la ciudad de Lugo rumbo a San Román da Retorta. A diferencia de etapas anteriores, en el día de hoy tan sólo unos veinte kilómetros separan ambas localidades por lo que podemos tomárnoslo con calma. Para finalizar esta etapa tenemos varias opciones: la tradicional, terminar en San Román, o continuar hasta Ponte Ferreira, en el concello de Palas de Rei.");  
        $manager->persist($etapa42);
        $manager->flush();

        $etapa43 = new Etapa();       
        $etapa43->setStart("San Romao");
        $etapa43->setFinish("Melide");        
        $etapa43->setKm(28.3);
        $etapa43->setDescription("En el día de hoy nos encontraremos con los peregrinos procedentes de Francia, enlazando así con la ruta del Camino Francés desde Melide. A través de caminos rurales de tierra y asfaltados avanzaremos entre pequeñas aldeas con un clara vinculación jacobea y con mucho encanto. Existen dos alternativas para realizar esta etapa, decantándonos por la conocida como variante de la “calzada romana”, por ser un poco más corta que la oficial.");  
        $manager->persist($etapa43);
        $manager->flush();

        $etapa44 = new Etapa();       
        $etapa44->setStart("Melide");
        $etapa44->setFinish("Arzúa");        
        $etapa44->setKm(14);
        $etapa44->setDescription("En esta etapa se abandona la provincia de Lugo para adentrarse en la última de las provincias por las que discurre, la provincia de A Coruña. Es una etapa exigente, con un perfil quebrado e irregular, donde son frecuentes las subidas cortas pero dificultosas, en la que conviven tramos en un estado de conservación excepcional que atraviesan aldeas maravillosas de la Galicia profunda con zonas menos gratificantes como polígonos industriales o tramos con un estado de conservación muy mejorable.");  
        $manager->persist($etapa44);
        $manager->flush();

        $etapa45 = new Etapa();       
        $etapa45->setStart("Arzúa");
        $etapa45->setFinish("Pedrouzo");        
        $etapa45->setKm(19.3);
        $etapa45->setDescription("Llegados a este punto, y a tan solo 40 kilómetros de entrar en la plaza del Obradoiro y contemplar nuestro destino, disponemos de varias opciones, siendo la más recomendable hacer noche en O Pedrouzo, dado que se trata de un lugar que dispone de todos los servicios necesarios y nos permite dejar una pequeña etapa para finalizar nuestro camino para el día siguiente. Es recomendable dividir la etapa en dos, y disfrutar de las dos últimas jornadas que nos restan para llegar a Compostela.");  
        $manager->persist($etapa45);
        $manager->flush();

        $etapa46 = new Etapa();       
        $etapa46->setStart("Pedrouzo");
        $etapa46->setFinish("Santiago de Compostela");        
        $etapa46->setKm(19.4);
        $etapa46->setDescription("Santiago aguarda y eso se nota en los caminantes. Algunos con paso ligero y con la mente puesta en la meta, otros sin embargo, con el paso sosegado de aquel que tiene miedo de llegar al final de su aventura y no saber lo que vendrá después. En cualquier caso, todos con la ilusión de alcanzar por fin la majestuosa plaza del Obradoiro y alzar la vista para vislumbrar la barroca fachada de la Catedral. Por delante, una etapa corta, sencilla, con pendientes moderadas y senderos agradecidos.");  
        $manager->persist($etapa46);
        $manager->flush();


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

