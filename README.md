# Introduction
A very simple todo app to implement Create Read Update Delete (CRUD) in laravel. Created to learn and while learning laravel, will keep improving the app if i have the will and time to

# How To Use
Make sure you have [PHP](https://www.php.net/), and a DBMS like [MySQL](https://www.mysql.com/) or [PostgreSQL](https://www.postgresql.org/) installed on your system. or [XAMPP](https://www.apachefriends.org/index.html) since it includes both PHP and mysql
1. Clone the app `git clone https://github.com/millenito/laravel-todos-app.git`
2. Create a database to store data from the app (start mysql if using xampp and create a database using phpmyadmin)
3. Cd into the app's directory `cd laravel-todos-app`
4. Open the **.env** file and fill in database's credentials (DB_CONNECTION, DB_DATABASE, etc)
5. Run `php artisan migrate` to automatically create all the tables
6. Run `php artisan serve` and open `localhost:8000` on your browser to open the app or just start apache and open localhost if using xampp

# Todo / Future Notes
- Handle database connection errors
- Handle all unexpected errors
- Add front-end scripting into the app (probably pure ES6 Javascript, but react could be nice too)
- Rework on the validation (using javascript or some libraries like [SweetAlert](https://github.com/sweetalert2/sweetalert2))
- Make the search function work to search for todos
- Add Pagination
- Login and user system, maybe?
