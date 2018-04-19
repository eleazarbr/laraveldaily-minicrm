# Laravel Daily - MiniCRM

This is my implementation of the mini-crm project from [Laravel Daily](http://laraveldaily.com/test-junior-laravel-developer-sample-project/).


#### Table of contents
- [About](#about)
- [Summary](#summary)
- [Installation Instructions](#installation-instructions)

#### About

- [x] Basic Laravel Auth: ability to log in as administrator or user.
- [x] Use database seeds to create first user with email "admin@admin.com" and password "password".
- [x] Employees DB table consists of these fields: First name (required), last name (required), Company (foreign key to Companies), email, phone 
- [x] Companies DB table consists of these fields: Name (required), email, logo (minimum 100×100), website
- [x] CRUD functionality (Create / Read / Update / Delete) for two menu items: Companies and Employees.
- [x] Use database migrations to create those schemas above
- [x] Create views
- [x] Store companies logos in storage/app/public folder and make them accessible from public
- [ ] Use basic Laravel resource controllers with default methods – index, create, store etc.

## Summary

- Install a new laravel app via `composer create-project laravel/laravel "5.5.*"`. Used Laravel 5.5 because my development machine had PHP 7.0.29.
- Executed `php artisan make:auth` command to generate the authentication scaffolding.
- After having created the database, run `php artisan migrate` to generate the basic structure of users.
- Created the seeder for users `UsersTableSeeder.php` now I can login.
- Created the resources controllers `CompaniesController` and `EmployeesController` and their respective models.
- Created the migrations for both models with their relationships.
- Developed an outline of CRUD code, to later test it from the frontend.
- Started with the company module, created views and form validations.
- Created views for employees.
- Created a symbolic link using `php artisan storage:link` to access the logos stored in storage.


#### Instalation Instructions

1. Run `git clone https://github.com/eleazarbr/laraveldaily-minicrm`
2. Create a MySQL database for the project
    * ```mysql -u root -p```, 
    * ```create database laraveldaily;```
    * ```\q```
3. From the projects root run `cp .env.example .env`
4. Configure your `.env` file
5. Run `composer update` from the projects root folder
6. From the projects root folder run `php artisan key:generate`
7. From the projects root folder run `php artisan migrate`
8. From the projects root folder run `composer dump-autoload`
9. From the projects root folder run `php artisan db:seed`
## License

This project is open-sourced software licensed under the MIT license.