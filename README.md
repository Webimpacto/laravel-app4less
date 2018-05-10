# App4Less push notifications channel for Laravel

This package makes it easy to send app4less/reskyt push notifications with Laravel.

## Installation

YYou can install the package via composer:

``` bash
composer require webimpacto/laravel-app4less
```

First you must install the service provider (skip for Laravel>=5.5):

``` php
// config/app.php
'providers' => [
    ...
    \Webimpacto\LaravelApp4Less\Providers\App4LessServiceProvider::class,

],
```

Launch artisan migrate, to create the Database Tables.
``` bash
php artisan migrate
```

Add the \Webimpacto\LaravelApp4Less\Middleware\App4lessSaveToken middleware to web group in the Http Kernel, this will be store the tokens in App4less table. 

``` php
// app/Http/Kernel.php
protected $middlewareGroups = [
    ...
    \Webimpacto\LaravelApp4Less\Middleware\App4lessSaveToken::class

],
```

## Usage

Now you can use the channel in your via() method inside the notification as well as send a app4less push notification:

``` php
use Illuminate\Notifications\Notification;
use Webimpacto\LaravelApp4Less\Channel\App4LessPushChannel;
use Webimpacto\LaravelApp4Less\Channel\App4LessPushMessage;

class AccountApproved extends Notification
{
    public function via($notifiable)
    {
        return [App4LessPushChannel::class];
    }

    public function toApp4LessPush($notifiable)
    {
    
    $user = User::find($this->friend->user_from);
    
    return (new App4LessPushMessage)
        ->title('Notification Title')
        ->url('Notification URL')
        ->utm('UTM-Analytics');
    }
}
```