# Password Manager

A simple classic password managing tool. Functionalities included:

* Account Creation - Register / Login 
* Store and retrieve your passwords
* Add / Remove your passwords
* Account Settings - Change account password / Delete Account

# KEY POINTS

* Back-End Technologies: PHP + MySQL
* Front-End Technologies: HTML, CSS, JQuery
* Authentication provided - SESSIONS used, logs out everytime you close your browser
* Password Hashing Algorithm - BCRYPT

# INSTALL

* git clone 'https://github.com/jp-mangoit/Password-Manager.git'

* Import the file `database.sql` provided in your mySQL.

* The controller folder has all the controllers which contains almost all PHP coding that has been done.

* `db_controller.php` controls the database operations. Specify your database details there.

* RUN `php -S localhost:8000` in the directory where the project is stored

* Open `http://localhost:8000/login.php` in any browser