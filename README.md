## Restaurant API RESTful
This is a Laravel Application.

Make sure you have PHP, MySQL, Apache and Composer installed.

## Installing
- Clone this repo:
```
$ git clone git@github.com:90lucasgabriel/restaurant-api.git
```
- Access directory:
```
$ cd restaurant-api
```
- Install dependencies:
```
$ composer install
```
- Create a copy of *.env.example* and rename to *.env*;

- Generate Laravel App Key:
```
$ php artisan key:generate
```
- Create database;

- Insert into *.env*: database, user and password;

- Create tables and seed database:
```
$ php artisan migrate:refresh --seed
```
- Serve the app:
```
$ php artisan serve
```

Head to http://localhost:8000 in your browser and you'll see the app running.

You can test endpoints with [Postman](https://www.getpostman.com/).
