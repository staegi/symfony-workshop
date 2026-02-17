# Symfony Workshop

## Dritte Aufgabe: Event erstellen 

Die Aufgabe ist es nun ein Command zu schreiben, mit dem einen Eintrag in die Tabelle `events` vornimmt. Dazu kann man wie folgt ein Command erstellen: 

``` shell
docker compose exec -it php bin/console make:command event:create
```

Damit du hier den EntityManager zur Verfügung hast, musst du folgenden Konstruktor ergänzen:

    public function __construct(private EntityManagerInterface $entityManager)
    {
        parent::__construct();
    }

Damit kannst du das neue Objekt dann persistieren:
    
    $this->entityManager->persist($event);

## Die Lösung 

Legen Sie Ihre Änderungen im Stash ab und schauen Sie sich die Lösung an:

``` shell
git add .
git stash
git checkout task/3/solution
```