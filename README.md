# BEFORE RUN CREATE .env FILE #


# PASTE THE CONTENT FROM THE .env.example FILE #



Run migration after you create the database with code name Dilema.

```sh
php artisan migrate:refresh
```

How to make migration:

php artisan make:migration create_articles_table 

After updating the migration with the desired changes to run it:
--path='path to the migration local space, not absoulte'
php artisan migrate --path='/database/migrations/2024_01_04_160519_create_articles_table.php'

How to make new model:

php artisan make:model <ModelName> e.g: Article

How to make seeder: 

php artisan make:seeder <NameSeeder> e.g: DatabaseSeeder, ProductSeeder

How to run seeder:

php artisan db:seed --class=<NameSeeder> e.g: DatabaseSeeder, ProductSeeder