<?php

namespace Nova\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Nova\CorpSite\BreadCrumbs;
use Nova\CorpSite\CustomDirective;
use Symfony\Component\HttpFoundation\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        CustomDirective::increment();

        if ('1' === $request->get('sqldbg')) {
            DB::listen(function ($query) {
                dump($query->sql);
            });
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // регистрация класса для цепочки навигации
        $this->app->singleton(\Nova\CorpSite\BreadCrumbs::class, function ($app) {
            return new BreadCrumbs();
        });
    }
}
