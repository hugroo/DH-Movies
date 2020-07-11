# DH-Movies

Este es un proyecto de una ABM de peliculas hecho en laravel

Para poder utilizar este proyecto, debes tener los siguientes requisitos:

1) debes tener la versión de PHP mayor o igual a la 7.2.5. 
para mas información visita la documentación oficial de Laravel: https://laravel.com/docs/7.x

2) debes tener instalado composer en tu equipo: https://getcomposer.org/

3) si utilizas windows, puedes descargar el programa git desde la página oficial: https://gitforwindows.org/

Si cumples con estos prerequisitos, entonces podrás instalar este proyecto.

Pasos para instalar este proyecto correctamente:

1) descarga este proyecto o clónalo con el comando: 

git clone https://github.com/hugroo/DH-Movies.git

2) ejecutar el comando: 

composer install

3) copiar el archivo ".env.example" y pegarlo con el nombre: ".env". Si estas con el sistema gitforwindows, o en linux o mac, puedes ejecutar el siguiente comando: 

cp .env.example .env

4) debemos generar una nueva llave de laravel con el siguiente comando:

php artisan key:generate

5) Configura la nueva base de datos modificando el archivo ".env":

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=movies_db
DB_USERNAME=root
DB_PASSWORD=

6) ejecutar esta consulta sql https://drive.google.com/file/d/1b0rxgjFIyU5POayvPVj4saJukvpLOqCM/view para crear las tablas

7) ejecuta php artisan migrate

8) ejecuta php artisan serve y prueba el proyecto que debe funcionar.
