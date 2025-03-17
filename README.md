# Symfony Workshop

## How to launch

simply run the following commands to launch the project:

``` shell
cp .env.example .env
docker compose up -d --build
docker compose exec -it php composer install 
```

With this command you can check if the system is running:

``` shell
docker compose exec -it php bin/console about 
```

Herewith you can clear the cache:

``` shell
docker compose exec -it php bin/console cache:clear
docker compose exec -it php composer dump-autoload 
```

A phpMyAdmin is running under [localhost:8080][1] if you need a quick look into the database.

## Current Task: Create Model 

This task is based on our migrations. Undo you database changes and migrate our version first:

``` shell
docker compose exec -it php bin/console doctrine:migrations:migrate -n
```

``` shell
docker compose exec -it php bin/console make:entity
```

[1]: http://localhost:8080/index.php?route=/database/structure&db=symfony
