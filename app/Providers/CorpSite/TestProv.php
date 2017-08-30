<?php
declare(strict_types = 1);

namespace Nova\Providers\CorpSite;

use Illuminate\Support\ServiceProvider;
use Nova\CorpSite\Main;

/**
 * Class TestProv
 *
 * @package Nova\Providers\CorpSite
 */
class TestProv extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //dump(__METHOD__);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Main::class, function ($app) {
            dump($app);
            return new Main();
        });
    }
}
