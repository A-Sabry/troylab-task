project requirements
---------------------
- PHP used 7.4
- laravel 8

project installation 
-------------------------------
- git clone https://github.com/A-Sabry/troylab-task.git

- Composer install
 
- php artisan migrate

- php artisan passport:install

- php artisan db:seed 

- to run command for recoder students
 
    php artisan Students:reorder 


-------------------------------
API
------------------------------ 
 User signup
------------------------------

- url : {domain}/api/register

- method : post

- parameters :email, password, name

- return user name and token

-------------------------------------------

 User login
-------------------------------------------
- url : {domain}/api/login

- method : post

- parameters :email, password

- return user token








