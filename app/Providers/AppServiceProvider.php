<?php

namespace App\Providers;

use App\Models\User;
use App\Services\MailchimpNewsLetter;
use App\Services\Newsletter;
use Facade\FlareClient\Api;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(Newsletter::class, function () {
            $client = (new ApiClient)->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us20'
            ]);

            return new MailchimpNewsLetter($client);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard();

        Gate::define('admin', function (User $user) {
            return $user->username === 'isobaba';
        });

        Blade::if('admin', function () {
            return request()->user()?->can('admin');
        });
    }
}
