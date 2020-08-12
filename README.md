# Prueba Técnica Nexura Internacional

Desarrollada por Cristian Loaiza.
Hecha en Laravel y MySQL.

## Instalación Laravel

Si se clona o descarga el repositorio se debe de:

• Tener instalado un servidor web. En mi caso utilicé XAMPP y el sistema operativo de Windows.

• Tener instalado el gestor de dependencias Composer ([https://getcomposer.org/](https://getcomposer.org/)).

• Ingresar a la carpeta del proyecto desde el cmd.

    cd c:\ruta\servidor\xampp\test-nexura-int

• Ejecutar la instalación de las dependencias de Laravel.

    composer install

• Ejecutar desde un navegador (Preferiblemente Chrome).

    localhost/**ruta_dentro_del_servidor_web**/test-nexura-int/public

## Base de Datos

Se encuentra en el archivo data_base.sql
    
Cambiar en el archivo .env los datos de conexión de la base de datos (Usuario y Contraseña), por defecto está con unsuario root y sin contraseña

        DB_USERNAME=root
        DB_PASSWORD=

## Validación

### Cliente

Se implementa una validación sencilla con [JQueryValidator](https://jqueryvalidation.org/).

### Servidor

Se implementa validación del request con la clase Validator de Laravel.

* Se valida que todos los campos estén diligenciados.
* Se valida el nombre mediante una expresión regular para que sólo permita letras con o sin tilde.
* Se valida que el email a registrar sea único.
