## Laravel trainings

Add the following Cron entry to your server :
<br>
`* * * * * php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1`

This app is running with Homestead & Docker (both are not mandatory) under Nginx

### With Docker 🐳 :

WIP : redis & laravel-echo doesn't working togeher

You need to install docker on your machine first

Build and run your containers in background with `-d` :
<br>
`docker-compose up`

You can build your image
<br>
`docker-compose build`

Run specfic command into container ;
<br>
`docker-compose exec`

Migrate your db ;
<br>
`docker container exec app php artisan migrate`

Seed your db ;
<br>
`docker container exec app php db:seed`

---

### Without Docker

Install dependancies for PHP
<br>
`composer install`

Migrate your db ;
<br>
`php artisan migrate`

Seed your db ;
<br>
`php artisan db:seed`

Install modules javascript
<br>
`npm install`

Then you will need to compile that, so
<br>
`npm run dev`

Init your NodeJS server
<br>
`laravel-echo-server init`

Node js websocket server
<br>
`laravel-echo-server start`
