## Laravel trainings

This app is running with Homestead & Docker (not mandatory) under Nginx

With Docker 🐳 :

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

---

Without Docker

Install dependancies for PHP
<br>
`composer install`

Install modules javascript
<br>
`npm install`

Then you will need to compile that, so
<br>
`npm run dev`

Node js websocket server
<br>
`laravel-echo-server start`
