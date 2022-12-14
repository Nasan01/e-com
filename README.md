# E-COM

E-commerce web application built using VueJS & Laravel

## screen shots

<img src="https://github.com/Nasan01/e-com/blob/main/screenshots/home.png" alt="homepage" title="Optional title">
<img src="https://github.com/Nasan01/e-com/blob/main/screenshots/login.png" alt="loginpage" title="Optional title">
<img src="https://github.com/Nasan01/e-com/blob/main/screenshots/register.png" alt="registerpage" title="Optional title">
<img src="https://github.com/Nasan01/e-com/blob/main/screenshots/cart.png" alt="cart1page" title="Optional title">
<img src="https://github.com/Nasan01/e-com/blob/main/screenshots/cart1.png" alt="cartPage" title="Optional title">

## Installation

if you want to run this project localy you can follow these steps :

* Create a sqlite file named database.sqlite inside the database folder
* Change the DB_DATABASE value in the .env file to the absolute path of database that you have created recently
* example DB_DATABASE="/home/projects/e-com/database/database.sqlite" or see the file .env.example on the root folder of this project as references

* You can also use any others database as what you want (like mysql,....)

After all these previous steps are done you can run the following command to run the project

With terminal
```sh
php artisan migrate
php artisan db:seed
```

```sh
npm run dev
```
With another terminal
```sh
php artisan serve
```

### if there are some problems during the following of these execution steps, feel free to create an issue in this repo
