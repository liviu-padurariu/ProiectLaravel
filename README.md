Run migration after you create the database with code name Dilema.

```sh
php artisan migrate:refresh
```


How to make seeder: 

php artisan make:seeder <NameSeeder> e.g: DatabaseSeeder, ProductSeeder

How to run seeder:

php artisan db:seed --class=<NameSeeder> e.g: DatabaseSeeder, ProductSeeder