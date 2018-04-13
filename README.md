# Laravel Daily - CRM Test

This is my implementation of the mini-crm project from [Laravel Daily](http://laraveldaily.com/test-junior-laravel-developer-sample-project/).

## Content

- [x] Basic Laravel Auth: ability to log in as administrator or user.
- [x] Use database seeds to create first user with email "admin@admin.com" and password "password".
- [ ] CRUD functionality (Create / Read / Update / Delete) for two menu items: Companies and Employees.
- [ ] Companies DB table consists of these fields: Name (required), email, logo (minimum 100×100), website
- [ ] Employees DB table consists of these fields: First name (required), last name (required), Company (foreign key to Companies), email, phone 
# Steps that I did to finish the project

- Install a new laravel app via `composer create-project laravel/laravel "5.5.*"`. Used Laravel 5.5 because my development machine had PHP 7.0.29.
- Executed `php artisan make:auth` command to generate the authentication scaffolding
- After having created the database, run `php artisan migrate` to generate the basic structure of users
- Created the seeder for users `UsersTableSeeder.php` now I can login.