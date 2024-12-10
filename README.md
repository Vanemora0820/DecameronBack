# Sistema de Gestión de Hoteles - Backend

Este es el backend del sistema de gestión de hoteles para el proyecto **Decameron**. El backend está desarrollado en PHP utilizando **Laravel** y se encarga de la lógica del sistema, validaciones y gestión de datos.

## Requisitos

- PHP 8.3.14
- Composer 2.8.3
- PostgreSQL 
- Laravel 10.x

## Instalación

1. Clona el repositorio:

   ```bash
   git clone https://github.com/Vanemora0820/DecameronBack.git
2. Accede al directorio del proyecto:
   cd DecameronBack
3. Instala las dependencias con Composer
    composer install
4. Configura la BD en env. 
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=decameron_db
    DB_USERNAME=postgres
    DB_PASSWORD=password123
5. Genera la clave de la aplicación
    php artisan key:generate
6. Ejecuta las migraciones para crear las tablas necesarias en la base de datos
    php artisan migrate
7. Inicia el servidor 
   php artisan serve
   El backend estará disponible en http://localhost:8000


## Derechos de Vanessa Mora
