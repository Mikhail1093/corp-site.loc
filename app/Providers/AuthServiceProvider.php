<?php

namespace Nova\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Nova\Models\CorpSite\Comment;
use Nova\Policies\CommentPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'Nova\Model' => 'Nova\Policies\ModelPolicy',
        Comment::class => CommentPolicy::class
        //'Nova\Models\CorpSite\Comment' => 'Nova\Policies\CommentPolicy'
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
