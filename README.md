# Nombre del Proyecto

Descripción corta del proyecto.

## Cómo Usar

A continuación se describen los pasos para descargar el código y hacerlo funcionar en un entorno de Laravel.

### Requisitos Previos

Antes de comenzar, asegúrate de tener instalado lo siguiente en tu sistema:

- Composer ([instrucciones de instalación](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos))
- Laravel ([instrucciones de instalación](https://laravel.com/docs/8.x/installation))

### Pasos para la Instalación

1. Clona el repositorio en tu máquina local utilizando Git:

    ```bash
    git clone https://github.com/tu-usuario/nombre-del-repositorio.git
    ```

2. Navega hasta el directorio del proyecto:

    ```bash
    cd nombre-del-repositorio
    ```

3. Instala las dependencias del proyecto utilizando Composer:

    ```bash
    composer install
    ```

4. Copia el archivo de configuración `.env.example` y renómbralo como `.env`:

    ```bash
    cp .env.example .env
    ```

5. Genera una clave de aplicación única:

    ```bash
    php artisan key:generate
    ```

6. Configura tu base de datos en el archivo `.env`:

    ```plaintext
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nombre_de_tu_base_de_datos
    DB_USERNAME=usuario_de_tu_base_de_datos
    DB_PASSWORD=password_de_tu_base_de_datos
    ```

7. Ejecuta las migraciones para crear las tablas en la base de datos:

    ```bash
    php artisan migrate
    ```

8. Ejecuta el servidor de desarrollo de Laravel:

    ```bash
    php artisan serve
    ```

9. Abre tu navegador web y visita `http://localhost:8000` para ver la aplicación en funcionamiento.

### Uso

Describe aquí cómo usar tu aplicación una vez que esté en funcionamiento. Proporciona ejemplos de cómo interactuar con ella y cualquier información relevante para los usuarios finales.

## Contribución

Describe cómo otros pueden contribuir a tu proyecto. Incluye pautas para la presentación de problemas y solicitudes de extracción.

## Licencia

Indica la licencia bajo la cual se distribuye tu proyecto.

## Installation 
Make sure that you have setup the environment properly. You will need minimum PHP 8.1, MySQL/MariaDB, and composer.

1. Download the project (or clone using GIT)
2. Copy `.env.example` into `.env` and configure your database credentials
3. Go to the project's root directory using terminal window/command prompt
4. Run `composer install`
5. Set the application key by running `php artisan key:generate --ansi`
6. Run migrations `php artisan migrate`
7. Start local server by executing `php artisan serve`
8. Visit here [http://127.0.0.1:8000/products](http://127.0.0.1:8000/products) to test the application
