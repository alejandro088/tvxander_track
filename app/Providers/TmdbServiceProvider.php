<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Tmdb\HttpClient\Plugin\LanguageFilterPlugin;
use Tmdb\HttpClient\Plugin\AdultFilterPlugin;

class TmdbServiceProvider extends ServiceProvider {

    /**
     * Add a Dutch language filter to the Tmdb client
     *
     * @return void
     */
    public function boot()
    {
        $plugin = new LanguageFilterPlugin('es');
        $client = $this->app->make('Tmdb\Client');
        $client->getHttpClient()->addSubscriber($plugin);

        $plugin = new AdultFilterPlugin(true);
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