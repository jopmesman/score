<?php

namespace Jopmesman\Score;

use Illuminate\Support\ServiceProvider;
use Jopmesman\Score\Http\Middleware\gameParticipant;

class ScoreServiceProvider extends ServiceProvider
{

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(\Illuminate\Routing\Router $router)
    {
        $router->aliasMiddleware('gameParticipant', gameParticipant::class);

        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'score');
        $this->loadMigrationsFrom(__DIR__.'/Database/migrations');
    }

    /**
     *
     */
    public function register()
    {
        //
    }

}