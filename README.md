# laravel_mysql_app
Laravel and mysql are used in this project.

### Instalation in 5 steps
```bash
git clone https://github.com/taboritis/coreui-laravel.git
cd coreui-laravel
composer install
cp .env.example .env
php artisan key:generate
```

- You have to register and login to app (database needed)
- If you are user MySQL you can paste this to your .env file:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=coreui
DB_USERNAME=root
DB_PASSWORD=
```

- To create table in database
```bash
	php artisan migrate
```
(or to create table with exemplary user 'John Doe')
```bash
	php artisan migrate:fresh --seed
``` 