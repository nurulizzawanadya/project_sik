 ## How to run project on your lovely local machine
 - [x] Clone this repository
 - [x] cd /path-to-your-project
 - [x] composer install --ignore-platform-reqs 
 - [x] cp .env.example .env
 - [x] Create Database name = "project_sik" on your local mysql
 - [x] php artisan key:generate
 - [x] php artisan migrate:fresh --seed
 - [x] php artisan storage:link
 - [x] php artisan serve

