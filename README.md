# Symfony-Workshop

## So starten Sie das Projekt

Führen Sie einfach die folgenden Befehle aus, um das Projekt zu starten:

```shell
cp .env.example .env
docker compose up -d --build
docker compose exec -it php composer install
```

Mit diesem Befehl können Sie überprüfen, ob das System läuft:

```shell
docker compose exec -it php bin/console about
```

## Erste Aufgabe 

Wechseln sie zur ersten Aufgabe mit:

``` shell
git checkout task/1/start 
```