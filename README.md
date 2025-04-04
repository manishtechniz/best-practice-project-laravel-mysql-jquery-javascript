# How to run
NOTE:: `laravel`: `v11` and `php`: `v8.2`

Run commands

- `composer install`

- Update `.env` file
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
DB_COLLATION=
```

- `php artisan config:cache`
- `php artisan optimize:clear`
- `php artisan migrate`
- `php artisan serve`

# Mail Host Configration

- update `.env` file
```env
MAIL_MAILER=
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=
```
- `php artisan queue:listen`

# Run Batch Jobs or Queues

- `php artisan queue:listen`

# Run Schedule Jobs/ Cron Jobs

-  `php artisan queue:listen`
-  `php artisan schedule:run`