<?php

namespace Nova\Providers;

use Illuminate\Support\Facades\URL;
use Nova\CorpSite\{
    SaveOrder,
    OrdersReportsToFile,
    OrdersDataBase
};

use Illuminate\Support\ServiceProvider;

/**
 * Class OrdersProvider
 *
 * @package Nova\Providers
 */
class OrdersProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\Nova\CorpSite\SaveOrder::class, function () {

            $currentRow = \Route::current()->uri;

            $obj = false;

            if ('test-ord-db' === $currentRow) {
                $obj = new OrdersDataBase();
            } elseif ('test-ord-file' === $currentRow) {
                $obj = new OrdersReportsToFile();
            }

            return new $obj;
        });
    }
}
