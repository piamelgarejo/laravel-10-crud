# AssisTech
AssistTech es un sistema que permite cargar alumnos, donde permite modificar y mostrar sus datos, eliminarlos. Además que permite visualizar un listado de asistencias existentes del alumno. El usuario podrá buscar, por medio de su dni, a un alumno, donde al encontrarlo podrá cargarle una nueva asistencia.

### Pasos para la Instalación
A continuación se describen los pasos para descargar el código y hacerlo funcionar en un entorno de Laravel 10.

Antes de comenzar, debes tener instalado en tu sistema:

- Composer ([instrucciones de instalación](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos))
- Laravel ([instrucciones de instalación](https://laravel.com/docs/8.x/installation))

1. Clona este repositorio en tu computadora desde Github:

    ```bash
    https://github.com/piamelgarejo/laravel-10-crud.git
    ```
    O bien si tienes descargado GitHubDeskop presiona la opción 
    ```bash
    Open with GitHub Desktop
    ```

2. Navega hasta el directorio del proyecto desde la terminal:

    ```bash
    cd laravel-10-crud
    ```

3. Instala Composer desde la terminal:

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
6. Crea una base de datos local en el motor MySql de tu preferencia.

7. Configura tu base de datos en el archivo `.env` según la creación anterior de la base de datos local:

    ```plaintext
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nombre_de_tu_base_de_datos
    DB_USERNAME=usuario_de_tu_base_de_datos 
    DB_PASSWORD=password_de_tu_base_de_datos
    ```

8. Ejecuta las migraciones para crear las tablas en la base de datos:

    ```bash
    php artisan migrate
    ```

9. Ejecuta el servidor de desarrollo de Laravel:

    ```bash
    php artisan serve
    ```

10. Abre tu navegador web y visita `http://localhost:8000` para ver la aplicación en funcionamiento.
