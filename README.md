# Symfony Workshop

## Fünfte Aufgabe: Abfrage der Events und deren Teilnehmer 

Die Aufgabe ist es nun ein weiteres Command zu schreiben, dass alle Events und die Anzahl derer Teilnehmer ausgibt. Dazu kann man wie folgt ein Command erstellen:

``` shell
docker compose exec -it php bin/console make:command event:list
```

Hier muss ebenfalls der EntityManager zur Verfügung gestellt werden.

## Lösung 

Legen Sie Ihre Änderungen im Stash ab und schauen Sie sich die Lösung an:

``` shell
git add .
git stash
git checkout task/5/solution
```