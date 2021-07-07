## Install
    - composer install
    - php artisan key:generate
    - The key will be written automatically in your .env file.
## Database
    - create database aluma_gubi
    - import datatabe aluma_gubi.sql
## Database Config
    - config/database.php
```
    edit .env
    
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=aluma_gubi
    DB_USERNAME=root
    DB_PASSWORD=
```
## vendor publish
    - php artisan vendor:publish
    - select 0 ([] Publish files from all providers and tags listed below)
## Dev
    - php artisan serve
## API
