## Prueba Técnica Nexura Internacional

Desarrollada por Cristian Loaiza.
Hecha en Laravel y MySQL.

Se implementa validación sencilla con JQueryValidator, en el controlador también se validan los datos con el Validator de PHP

## Instalación Laravel

Si se clona o descarga el repositorio se debe de:

• Tener instalado un servidor web. En mi caso utilicé XAMPP y el sistema operativo de Windows.

• Tener instalado el gestor de dependencias Composer (<a href="https://getcomposer.org/" target="_blank">https://getcomposer.org/</a>).

• Ingresar a la carpeta del proyecto desde el cmd.

    cd c:\ruta\servidor\xampp\test-nexura-int

• Ejecutar la instalación de las dependencias de Laravel.

    composer install

## Base de Datos

Se encuentra en el archivo data_base.sql
    
    Cambiar el archivo .env los datos de conexión de la base de datos (Usuario y Contraseña), por defecto está con unsuario root y sin contraseña

        DB_USERNAME=root
        DB_PASSWORD=
