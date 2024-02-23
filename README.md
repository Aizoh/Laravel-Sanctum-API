
## About Project

This project is an Implementation of how access tokens can be used to consume API's

- [Simple, fast routing engine](https://laravel.com/docs/routing).


## Starting Project
```php
composer require laravel/sanctum
php artisan make:model Product -mrc

/**
 * add Sanctum's middleware to your api middleware group within your application's app/Http/Kernel.php file:
 * **/
'api' => [
    \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
    \Illuminate\Routing\Middleware\ThrottleRequests::class.':api',
    \Illuminate\Routing\Middleware\SubstituteBindings::class,
],
/**
 * To begin issuing tokens for users, your User model should use the Laravel\Sanctum\HasApiTokens trait:
 * **/
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
}

```

### Sanctum Documentation

- **[Sanctum Docs](https://laravel.com/docs/10.x/sanctum)**


## Contributing

define protected routes
```php
//PROTECTED ROUTES
Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products', [ProductController::class, 'update']);
   
});
```
add Auth Controller
```php

```
## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## make an invoice seeder and model
```php
php artisan make:model Invoice -mrc
php artisan make:seeder InvoiceSeeder
php artisan make:factory InvoiceFactory
```
call edit the factory add fields, in the seeder call the factory.
then seed .
```php
php artisan db:seed --class=InvoiceSeeder

composer require barryvdh/laravel-dompdf
```