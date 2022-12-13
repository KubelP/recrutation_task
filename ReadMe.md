
# Recrutation task - GraphQl api in Symfony

This project contains simple CRUDE GraphQl api build in Symfony framework according to recrutation task.

## My setup

- Operating system Ubuntu 22.04.1
- PHP version 8.2.2
- Symfony version 6.1
- Database localy in Mysql version 8.0.31
- Composer version 2.4.4

## Installation

For installation go to your directory and clone repository:

```bash
$ git clone https://github.com/KubelP/recrutation_task.git
```

Go to directory recrutation_task: 
```bash
$ cd recrutation_task
```

 and install components by composer:

```bash
$ composer install
```

After installation of neccesery packeges in .env file, configure your database by adding login, password and access route to MySQL. 

        DATABASE_URL="mysql://LOGIN:PASSWORD@accesroute/CarBrand?serverVersion=8.0.31&charset=utf8mb4"

Than create database:

```bash
$ php bin/console doctrine:database:create
```

>That will create database with CarBrand name - it can be change in DATABASE_URL.

Create migration:

```bash
$ php bin/console make:migration
```

and perform migration to database:

```bash
$ php bin/console doctrine:migrations:migrate
```

Clear cache:

```bash
$ php bin/console cache:clear
```

## Starting app

Run server:

```bash
$ symfony server:start
```

Open browser and go to ht<span>tp://127.0.0.1:8000/graphiql.

Api can create, read, update and delete data from database.  
It has three fields:
- id - prmiary key - intiger or string
- brandname - name of the car brand - string
- year - year of established of car brand - intiger

All fields are non-nullable.

## Endpoint

ht<span>tp://127.0.0.1:8000/

## Important files

[Graphql config files](https://github.com/KubelP/recrutation_task/tree/main/config/graphql/types)

[Resolver](https://github.com/KubelP/recrutation_task/tree/main/src/Resolver)

[Service](https://github.com/KubelP/recrutation_task/tree/main/src/Service)
