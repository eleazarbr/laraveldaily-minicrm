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
- [x] Use basic Laravel resource controllers with default methods – index, create, store etc.
- [x] Use Laravel’s validation function, using Request classes
- [x] Use Laravel’s pagination for showing Companies/Employees list, 10 entries per page
- [x] Use Laravel make:auth as default Bootstrap-based design theme, but remove ability to register
- [x] Use Datatables.net library to show table – with our without server-side rendering
- [ ] Use more complicated front-end theme like AdminLTE
- [ ] Email notification: send email whenever new company is entered (use Mailgun or Mailtrap)
- [ ] Make the project multi-language (using resources/lang folder)
- [ ] Basic testing with PHPUnit


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
- Finished coding the basic crud for companies and employees.
- In this [commit](https://github.com/eleazarbr/laraveldaily-minicrm/commit/3bc191fbc5f9ecc054cf063ab1fea683bd224969), I added the Laravel's Pagination, this was a feature that I had never used, because I always used DataTables!
- Removed the ability to register, simply overriding the register route in the web.php file.
- Replaced the PHP way to render tables, now [DataTables](https://datatables.net/) library is used. Used [Laravel Mix](https://laravel.com/docs/5.6/mix) to define the compilation steps of the Webpack.
- Used [Admin BSB Material Design](https://github.com/gurayyarar/AdminBSBMaterialDesign) instead of [AdminLTE](https://github.com/almasaeed2010/AdminLTE), developed with Bootstrap 3 Framework and Google Material Design. 


#### Installation Instructions

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