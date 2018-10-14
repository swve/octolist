# OctoList

This is a simple ToDo app with Ajax by Sweave

## Installation

Clone the repository-
```
git clone https://github.com/swve/OctoList.git
```

Then cd into the folder with this command-
```
cd Octolist
```

Then do a composer install
```
composer install
```
Then create a environment file using this command- , change database values 
```
cp .env.example .env
```

Then create a database and then do a database migration using this command-
```
php artisan migrate
```

At last generate application key, which will be used for password hashing, session and cookie encryption etc.

```
php artisan key:generate
```

## Run server

Run server using this command-
```
php artisan serve
```
