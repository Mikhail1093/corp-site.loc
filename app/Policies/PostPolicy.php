<?php

namespace Nova\Policies;

use Nova\Models\CorpSite\Blog;
use Nova\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the blog.
     *
     * @param  \Nova\User $user
     * @param  \Nova\Blog $blog
     *
     * @return mixed
     */
    public function view(User $user, Blog $blog)
    {
        //
    }

    /**
     * Determine whether the user can create blogs.
     *
     * @param  \Nova\User $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the blog.
     *
     * @param  \Nova\User $user
     * @param  \Nova\Blog $blog
     *
     * @return mixed
     */
    public function update(User $user, Blog $blog)
    {
        //
    }

    /**
     * Determine whether the user can delete the blog.
     *
     * @param  \Nova\User $user
     * @param  \Nova\Blog $blog
     *
     * @return mixed
     */
    public function delete(User $user, Blog $blog)
    {
        //
    }
}
