# Kumu Test Backend API 

[Laravel  REST API using Passport Authentication ](https://www.positronx.io/laravel-rest-api-with-passport-authentication-tutorial/)

----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Alternative installation is possible without local dependencies relying on [Docker](#docker). 

Clone the repository

    git clone https://github.com/deepfaith/Kumu-Exam.git

Switch to the repo folder

    cd Kumu-Exam-master

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Configure Redis (**Set the redis variables in .env and in app/config/database.php**)

    REDIS_CLIENT=predis
    QUEUE_CONNECTION=predis
    CACHE_DRIVER=redis


Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone git@github.com:gothinkster/laravel-realworld-example-app.git
    cd laravel-realworld-example-app
    composer install
    cp .env.example .env
    php artisan key:generate
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

The api can be accessed at [http://localhost:8000/api](http://localhost:8000/api).

## API Specification


> [Full API Spec](https://github.com/deepfaith/Kumu-Exam/tree/master/public)

----------

## Dependencies

- [fideloper/proxy](https://github.com/fideloper/TrustedProxy) - Set trusted proxies for Laravel
- [laravel-cors](https://github.com/barryvdh/laravel-cors) - For handling Cross-Origin Resource Sharing (CORS)
- [guzzlehttp/guzzle](https://github.com/guzzle/guzzle) - Guzzle is a PHP HTTP client library
- [laravel/passport](https://github.com/laravel/passport) - Laravel Passport provides OAuth2 server support to Laravel.
- [https://github.com/predis/predis](https://github.com/laravel/passport) - A flexible and feature-complete Redis client for PHP. (Bit slow)
