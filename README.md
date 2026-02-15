# Symfony-Workshop

## Erste Aufgabe: Migration erstellen

Diese Aufgabe basiert auf [diesem ER-Modell][1]. Erstellen Sie eine Migration, um es in der Datenbank zu implementieren:

``` shell
docker compose exec -it php bin/console doctrine:migrations:generate
```

Öffnen Sie nun die generierte Datei und implementieren die Migrationsmethoden `getDescription`, `up` und `down`:
``` shell
open migrations/* -a PHPStorm
```

Anschließend versuchen Sie, Ihre Migration mit diesem Befehl auszuführen:

``` shell
docker compose exec -it php bin/console doctrine:migrations:migrate -n
```

Überprüfen Sie auch das Downgrade:

``` shell
docker compose exec -it php bin/console doctrine:migrations:execute --down "$(docker compose exec -it php bin/console doctrine:migrations:latest | tr -d '\r\n ')" -n
```

## Die Lösung 

Legen Sie Ihre Änderungen im Stash ab und schauen Sie sich die Lösung an:

``` shell
git add .
git stash
git checkout task/1/solution 
```

[1]: https://mermaid.live/edit#pako:eNqVVF1rwjAU_SshTxMUtjH30LdOO1b2YXFFxihIaFINtEmXD8dQ__uS2tbU6dzy0t57zrn3knPbNUw5JtCDRIwpWghUJAyYE8yClxhsNoMBX4PIn8bhKIx8k_JAiYSiKS2RIjJhLn29C-yhGIQmEz2CBAYrwhTQjH5oYgAT0IwSkUCHzqSiSivK2byWNjoHAuHYFZl0TsDMn44e_OnF7U2v1VSIS8VEpoKWVZE4eNtXdwCXby-lrXx1ua9sgc7gco5SRVcE3E0mTy2tyqGqXZajhauQytyfUSkw9uMgDp-DVlVBZvii04IwfJxugB_kVBDjCz7KrzA70qFIl_ikKEdS1YSObrt7uKtxwv6o2ZdzS0Bsw8b--z9uTkaFVAwVe7uuh8PeQduW1DFCi3O6muKqSiTlJxf4N1nDOW-Mq_qnPa70pEmwDwsiCkSx-cQrfxKolsQyPPOKSYZ0rizdUpFW_PWLpdBTQpM-FFwvltDLUC5NtKtf_yXarOn_znkTb78BdkJbLg
