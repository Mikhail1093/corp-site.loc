<?php

namespace Nova\Policies;

use Illuminate\Support\Facades\Auth;
use Nova\Models\CorpSite\Comment;
use Nova\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class CommentPolicy
 *
 * @package Nova\Policies
 */
class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the comment.
     *
     * @param  \Nova\User                   $user
     * @param \Nova\Models\CorpSite\Comment $comment
     *
     * @return mixed
     */
    public function view(User $user, Comment $comment)
    {
        //
        dump(__METHOD__);
    }

    /**
     * Determine whether the user can create comments.
     *
     * @param  \Nova\User $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
        //
        dump(__METHOD__);
    }

    /**
     * Determine whether the user can update the comment.
     *
     * @param  \Nova\User                   $user
     * @param \Nova\Models\CorpSite\Comment $comment
     *
     * @return mixed
     */
    public function update(User $user, Comment $comment)
    {
        $flag = false;

        dump(__METHOD__);

        if (Auth::user()) {
            $flag = true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the comment.
     *
     * @param  \Nova\User                   $user
     * @param \Nova\Models\CorpSite\Comment $comment
     *
     * @return mixed
     */
    public function delete(User $user, Comment $comment)
    {
        //
        dump(__METHOD__);
    }
}
