# AssisTech
AssistTech es un sistema que permite cargar alumnos, donde el usuario una vez registrado y logeado en el sistema podrá modificar y mostrar los datos de los alumnos, también eliminarlos. 
Respecto a asistencias, el sistema permite visualizar un listado de las asistencias existentes del alumno seleccionado. Además el usuario podrá buscar, por medio de su dni, a un alumno, donde al encontrarlo podrá cargarle una nueva asistencia para el corriente día.
El sistema posee un apartado en su pantalla de inicio donde se notificará cuando un alumno cargado cumpla años el corriente día.

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

2. Navega hasta el directorio del proyecto desde la terminal de laravel si es necesario, si ya se encuentra allí ignore ese paso:

    ```bash
    cd laravel-10-crud
    ```

4. Copia el archivo de configuración `.env.example` y renómbralo como `.env`:

    ```bash
    cp .env.example .env
    ```
5. Ingrese los siguientes comandos desde la terminal:
     ```bash
    -composer Install
	-php artisan key:generate
	-npm install
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
    - php artisan migrate para hacer las migraciones sin datos de prueba
    - php artisan migrate --seed hace las migraciones y genera datos de prueba para utilizar el sistema 
    ```

9. Ejecuta el servidor de desarrollo de Laravel junto al entorno de desarrollo de javascript: 

    ```bash
    - php artisan serve
	- npm run dev
    ```

10. Abre tu navegador web y visita `http://localhost:8000` para ver la aplicación en funcionamiento.

11. Si deseas agregar un rol de 'admin' a un usuario en específico puedes realizarlo por comando en la terminal de la siguiente manera:
    ```bash
    - php artisan tinker <- Ingrese este comando 
    - Ingrese $user = \App\Models\User::find('id del usuario que desea agregar el rol');
        Ej: $user = \App\Models\User::find(1);
    - Devolverá los datos del usuario seleccionado, una vez chequeado que sea el correcto, ingrese:
        $user->role = 'admin' <- si desea asignarle rol admin, sino puede configurar nombre del rol deseado;
    - $user->save();  <- Guarda los datos asignados
    - Exit <- Ingrese exit para cerrar tinker. 
```
