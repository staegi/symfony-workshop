# Symfony-Workshop

## Erste Aufgabe: Lösung 

Diese Aufgabe basiert auf [diesem ER-Modell][1]. Schauen Sie sich gerne die Lösung einmal an:

``` shell
open migrations/* -a PHPStorm
```

Die Lösung wird die Grundlage für die zweite Aufgabe sein. Daher führen Sie die Migration bitte aus, damit die Datenbankstruktur entsprechend vorbereitet ist:

``` shell
docker compose exec -it php bin/console doctrine:migrations:migrate -n
```

Im Webbrowser können Sie die Datenbank auch per phpMyAdmin unter [localhost:8080][2] betrachten.

## Zweite Aufgabe

Wechseln sie zur zweiten Aufgabe mit:

``` shell
git checkout task/2/start 
```

[1]: https://mermaid.live/edit#pako:eNqVVF1rwjAU_SshTxMUtjH30LdOO1b2YXFFxihIaFINtEmXD8dQ__uS2tbU6dzy0t57zrn3knPbNUw5JtCDRIwpWghUJAyYE8yClxhsNoMBX4PIn8bhKIx8k_JAiYSiKS2RIjJhLn29C-yhGIQmEz2CBAYrwhTQjH5oYgAT0IwSkUCHzqSiSivK2byWNjoHAuHYFZl0TsDMn44e_OnF7U2v1VSIS8VEpoKWVZE4eNtXdwCXby-lrXx1ua9sgc7gco5SRVcE3E0mTy2tyqGqXZajhauQytyfUSkw9uMgDp-DVlVBZvii04IwfJxugB_kVBDjCz7KrzA70qFIl_ikKEdS1YSObrt7uKtxwv6o2ZdzS0Bsw8b--z9uTkaFVAwVe7uuh8PeQduW1DFCi3O6muKqSiTlJxf4N1nDOW-Mq_qnPa70pEmwDwsiCkSx-cQrfxKolsQyPPOKSYZ0rizdUpFW_PWLpdBTQpM-FFwvltDLUC5NtKtf_yXarOn_znkTb78BdkJbLg
[2]: http://localhost:8080/index.php?route=/table/structure&db=symfony 