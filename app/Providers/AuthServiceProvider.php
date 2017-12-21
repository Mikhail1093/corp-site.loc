<?php

namespace Nova\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Nova\Models\CorpSite\Comment;
use Nova\Policies\CommentPolicy;
use Nova\Policies\TestPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'Nova\Model' => 'Nova\Policies\ModelPolicy',
        Comment::class => CommentPolicy::class,
        Comment::class => TestPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
