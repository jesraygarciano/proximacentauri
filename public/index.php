<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

// echo $actual_link;

function authenticate()
{
    $auth_users = [
        [
        'username'=>'admin',
        'password'=>'admin',
        ],
        [
            'username'=>'admin2',
            'password'=>'admin2',
        ],
    ];

    foreach($auth_users as $user){
        if(@$_SERVER['PHP_AUTH_USER'] === $user['username'] && @$_SERVER['PHP_AUTH_USER'] === $user['password']){
            return true;
        }
    }

    return false;
}

if(!authenticate())
{
    header('WWW-Authenticate: Basic realm="thetutlage"');
    header('HTTP\ 1.0 401 Unauthorized');

    echo 'You are not authorized to access content!';
    exit;
}

// setcookie('name', 'value', time() + (86400), "/");// 86400 = 1 day


$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
