# Symfony Workshop

## Vierte Aufgabe: Teilnehmer hinzufügen 

Die Aufgabe ist es nun ein weiteres Command zu schreiben, mit dem ein Eintrag in die Tabelle `participants` vornimmt. Dazu kann man wie folgt ein Command erstellen:

``` shell
docker compose exec -it php bin/console make:command event:add-participant
```

Hier muss ebenfalls der `EntityManager` zur Verfügung gestellt werden.

## Die Lösung 

Legen Sie Ihre Änderungen im Stash ab und schauen Sie sich die Lösung an:


``` shell
git add .
git stash
git checkout task/4/solution
```