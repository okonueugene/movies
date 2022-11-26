<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::composer('welcome', function ($view) {
            
            $search= Http::get('https://imdb-api.com/en/API/SearchMovie/k_97cl48wo/ironman')->json()['results'];

            $view->with('movies', collect($search)->take(7));
        });
        
    }
}
