# Population and nutrition

Development by **bich**

## Environment
- Nginx: 1.12
- PHP: 7.3
- MySql: lastest
- Laravel Framework: lastest

## Install guide

- `composer install`
- `cp .env.example .env`
- `php artisan key:generate`
- Config .env && Create migration table in database:

    ``php artisan migrate``

    ``php artisan migrate --seed``
