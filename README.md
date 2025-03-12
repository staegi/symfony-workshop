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

A phpMyAdmin is running under [localhost:8080][1] if you need a quick look into the database.

## Current Task: Create Migration

This task is based on [this ER model][2]. Create a migration to implement that in the database:

``` shell
docker compose exec -it php bin/console doctrine:migrations:generate
```

Try to run your migration with that command:

``` shell
docker compose exec -it php bin/console doctrine:migrations:migrate -n
```

And also check the downgrade:

``` shell
docker compose exec -it php bin/console doctrine:migrations:execute --down "DoctrineMigrations\Version20250317023951"
```

## Shutdown

We are done for today, so shut down with:

``` shell
docker compose down
```

[1]: http://localhost:8080/index.php?route=/database/structure&db=symfony
[2]: https://mermaid.live/edit#pako:eNqVVF1rwjAU_SshTxMUtjH30LdOO1b2YXFFxihIaFINtEmXD8dQ__uS2tbU6dzy0t57zrn3knPbNUw5JtCDRIwpWghUJAyYE8yClxhsNoMBX4PIn8bhKIx8k_JAiYSiKS2RIjJhLn29C-yhGIQmEz2CBAYrwhTQjH5oYgAT0IwSkUCHzqSiSivK2byWNjoHAuHYFZl0TsDMn44e_OnF7U2v1VSIS8VEpoKWVZE4eNtXdwCXby-lrXx1ua9sgc7gco5SRVcE3E0mTy2tyqGqXZajhauQytyfUSkw9uMgDp-DVlVBZvii04IwfJxugB_kVBDjCz7KrzA70qFIl_ikKEdS1YSObrt7uKtxwv6o2ZdzS0Bsw8b--z9uTkaFVAwVe7uuh8PeQduW1DFCi3O6muKqSiTlJxf4N1nDOW-Mq_qnPa70pEmwDwsiCkSx-cQrfxKolsQyPPOKSYZ0rizdUpFW_PWLpdBTQpM-FFwvltDLUC5NtKtf_yXarOn_znkTb78BdkJbLg
