<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Mail;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Paginator::useBootstrapFive();
        
        // Add this line to register the mail component
        $this->app->bind('mail.manager', function($app) {
            return $app['Illuminate\Mail\MailManager'];
        });
    }
}