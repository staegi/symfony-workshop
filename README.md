# Symfony Workshop

## Zweite Aufgabe: Model erstellen 

Mit folgendem Kommando starten Sie einen Dialog, um eine Entität zu erstellen:

``` shell
docker compose exec -it php bin/console make:entity 
```

Das muss man für jede Entität erneut machen. Man sollte jedoch mit den Entitäten starten, die keinen Fremdschlüssel haben. Zudem sollten die Felder mit dem Erstell- und Aktualisierungsdatum jeweils mit den [Timestampables][1] implementiert werden. Dafür gibt es ein Trait namens `TimestampableEntity`, dass man einfach benutzen kann. Somit kann man das im Dialog vernachlässigen und muss nur am Ende das Trait in den Entitäten einfügen. Die Getter für Booleans muss man leider nachbearbeiten, weil der Maker die Datenbankfelder mit Präfix `is_` doppelt moppelt was den Präfix beim Getter von `isIs` ergibt, z.B. `isIsEnabled()`. Das sollte aber nur `isEnabled()` heißen.

## Die Lösung

Legen Sie Ihre Änderungen im Stash ab und schauen Sie sich die Lösung an:

``` shell
git add .
git stash
git checkout task/2/solution 
```

[1]: https://github.com/doctrine-extensions/DoctrineExtensions/blob/main/doc/timestampable.md#configuring-timestampable-objects