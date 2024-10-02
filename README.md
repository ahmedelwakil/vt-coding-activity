<h1 align="center">Virginia Tech (VT) <br> The Electronic Research Administration (ERA) <br> Coding Activity</h1>

This project is based on the Laravel framework. Please refer to their website for any further information.

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Project Deployment

The project is based on Docker Compose. You can find the containers' configuration in the [docker-compose.yaml](/docker-compose.yaml).

#### Containers Description

The project consists of 3 main containers:
1. **App Container**: This is the main server application which holds the business logic.
    - **Container Name**: vt-app
    - **Port**: 9000
2. **Database Container**: This is the database container that is build using the mysql technology.
    - **Container Name**: vt-mysql
    - **Port**: 8090
3. **phpmyadmin Container**
    - **Container Name**: vt-phpmyadmin
    - **Port**: 8080

To access any of the containers run ```docker exec -it {container-name} bash```. Please refer to the [docker-compose.yaml](./docker-compose.yaml) file for all containers' configuration.

#### How to Deploy Locally
Steps on how to deploy (Make sure docker-compose is installed on your machine):
- Clone project on your local machine
- Open the command line and change the current directory to the project directory
- Create <b>[.env](./.env)</b> file and copy it's content from the <b>[.env.deploy](./deploy-docker/.env.deploy)</b>
- Run Command ```docker-compose up -d```
- Enjoy! :star_struck:

<b>**Note</b> You may need to run the command ```chmod 777 /var/www/html/storage/ -R``` initially for the storage directory. 

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.
