<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Tmdb\HttpClient\Plugin\LanguageFilterPlugin;

class TmdbServiceProvider extends ServiceProvider {

    /**
     * Add a Dutch language filter to the Tmdb client
     *
     * @return void
     */
    public function boot()
    {
        $plugin = new LanguageFilterPlugin('nl');
        $client = $this->app->make('Tmdb\Client');
        $client->getHttpClient()->addSubscriber($plugin);
    }

    /**
     * Register services
     * @return void
     */
    public function register()
    {
        // register any services that you need
    }
}