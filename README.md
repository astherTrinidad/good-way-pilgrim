# good-way-pilgrim-back
El modelo propone una estructura modelo-vista-controlador con un entorno estándar para facilitar el mantenimiento futuro y la incorporación de nuevos desarrolladores al proyecto. Además, todo el proyecto, excepto los nombres de algunas entidades cuya traducción sería semánticamente incorrecta, se desarrolla en inglés para facilitar el acceso al código a cualquier desarrollador.



## Características 📋

•	Framework

Se utiliza Symfony 5.

•	Lenguajes

El código se escribe en PHP 8 y las sentencias que se ejecutan en la base de datos son de tipo SQL.

•	Docker

Para levantar la API y la base de datos usamos docker para escritorio (Se puede descargar en https://docs.docker.com/docker-for-windows/install/).

•	Integración con bases de datos

Se integra con Doctrine, ORM para bases de datos con Symfony. Solamente hay que configurar los datos de conexión y los modelos. La base de datos es MySQL.


## Quick start 🚀

Con estos pasos la API estará preparada para hacerle llamadas desde el front o desde una aplicación (por ejemplo, un bucador).
1.	Descarga del proyecto desde el repositorio de GitHub https://github.com/astherTrinidad/good-way-pilgrim-back
2.	Iniciar Docker 
3.	Actualizar en la máquina virtual de PHP el esquema de la base de datos
4.	En esta misma máquina, cargar los datos de prueba (fixtures)

Se aportan instrucciones detalladas de cada uno de estos pasos en los apartados siguientes.


## Pruebas ⚙️

Para ejecutar los tests utilizamos Postman, que se puede usar online (precisa descargar el cliente https://www.postman.com/downloads/) o en local también tras descarga previa. Llevamos a cabo primero una llamada al end point del login con un usuario y una contraseña estándar de la base de datos para obtener el token y ya con él podemos probar el resto de llamadas a los end points de la API.


## Despliegue local 📦


### Docker

El proyecto contiene un fichero para configurar las imágenes docker y su ejecución mediante docker-compose: docker-compose.yml, con detalles de las tecnologías utilizadas y los puertos. Este proyecto en local corre en el puerto 8000, lo que significa que se podrá ejecutar en el navegador con:
```
http://localhost:8000/rutaEndPoin
```
Antes de esto y con docker correctamente descargado es preciso situarnos mediante consola en la carpeta del proyecto y ejecutar docker-compose up, para iniciar todas las máquinas virtuales que harán de servidor y base de datos. Se pueden detener también con docker-compose down o mediante la aplicación de escritorio. También con esta aplicación se puede acceder a las tres máquinas virtuales que lo componen por separado.
docker-compose.yml
Para especificar las variables, docker-compose utiliza un fichero .env. En este fichero aparece, por ejemplo, la definición del entorno:
```
APP_ENV=local
```
APP_ENV=local
Docker-compose selecciona la imagen adecuada y el script correcto en packages.json para su ejecución.
Otros datos importantes contenidos en este fichero son los puertos que utiliza la base de datos y sus claves de acceso como root.

### Base de datos

Para aplicar nuestro modelo de entidades y relaciones a la base de datos y una vez con docker funcionando, accedemos a la consola de php y ejecutamos:
```
php bin/console doctrine:schema:update --force
```

Si no formzamos el comando nos advertirá de lo siguiente:
```
[CAUTION] This operation should not be executed in a production environment!
```
Este aviso nos debe recordar que es preciso ser cauteloso con los cambios estructurales en la base de datos. En el caso de que el proyecto ya esté terminado este comando solo debería ejecutarse una vez, es decir, al principio y como carga del proyecto en local.

### Datos de prueba
  
La aplicación contiene una serie de datos base como la información de los caminos y las etapas y datos de prueba de usuarios. Si no los cargamos la aplicación aparecerá vacía. Para ello ejecutamos en la máquina vitual de PHP el siguiente comando:
```
php bin/console doctrine:fixtures:load --env=dev
```
Como vemos es preciso concretar que el entorno es de desarrollo para que funcione correctamente.


## Construido con 🛠️

•	Symfony 5
•	Doctrine
•	PHP 8
•	MySQL
•	JSON Web Tokens
•	HTTP Status 


## Versionado 📌

Primera versión de la aplicación.


## Autoras ✒️

Asther Trinidad, Patricia Herranz e Irene Sánchez
