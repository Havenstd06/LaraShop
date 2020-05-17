# LaraShop

A simple shop made with Laravel 7 & Tailwind CSS. (Still in development)

![cover](https://user-images.githubusercontent.com/33732634/82132743-6371e380-97e3-11ea-8223-250cde809488.png)

[![StyleCI](https://github.styleci.io/repos/264305448/shield?branch=master)](https://github.styleci.io/repos/264305448)
[![Laravel](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Laravel](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

<hr>

## Requirement
- [**PHP**](https://php.net) 7.2+ (**7.4** preferred)
- PHP Extensions: openssl, mcrypt and mbstring, phpredis
- Database server: [MySQL](https://www.mysql.com) or [**MariaDB**](https://mariadb.org)
- [Redis](http://redis.io) Server
- [Composer](https://getcomposer.org)
- [Node.js](https://nodejs.org/) with npm

## Installation
* Clone the repository: `git clone https://github.com/Havenstd06/LaraShop.git`
* Create a database
* Install: `composer install`
* Create configuration env file `.env` refer to `.env.example`
* Generate a new application key `php artisan key:generate`
* Create storage link `php artisan storage:link`
* Setup database tables: `php artisan migrate:fresh --seed` (recommanded)
* Install node module `npm install && npm run dev`

## Setup Admin Panel

#### With Seeds:

You now have full access to the shop !  
To access the Voyager admin panel go to `/admin`.  
**Attention** to authorize the **admin user** to access the admin panel you **must change** the `role_id` to` 1` in the **database** (I have to fixed this 😅).

Login: 
>**email:** `admin@admin.com`   
>**password:** `password`

#### Without Seeds: 
Check the [Voyager Docs](https://github.com/the-control-group/voyager/blob/1.4/README.md#creating-an-admin-user).

## Setup Stripe
* go on https://dashboard.stripe.com/apikeys
* take your `Secret key`
* paste on `STRIPE_API_KEY` in `.env`

# Done!

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)
