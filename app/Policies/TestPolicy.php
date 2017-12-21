<?php
declare(strict_types=1);

namespace Nova\Policies;

use Illuminate\Http\Request;
use Nova\Exceptions\IncorrectInputDataException;
use Nova\Http\Controllers\CorpSite\Api\AppApiController;
use Nova\Models\CorpSite\Comment;
use Nova\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TestPolicy
{
    use HandlesAuthorization;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * TestPolicy constructor.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function __construct(Request $request)
    {
        $this->setApiKey($request['key']);
    }

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
        //!!!! только для зареганных юзеров
        try {
            (new AppApiController)->checkApiKey($this->getApiKey());

            return true;
        } catch (IncorrectInputDataException $exception) {
            return false;
        }
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     */
    public function setApiKey(string $apiKey)
    {
        $this->apiKey = $apiKey;
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
    }

    /**
     * Determine whether the user can update the comment.
     *
     * @param  \Nova\User    $user
     * @param  \Nova\comment $comment
     *
     * @return mixed
     */
    public function update(User $user, Comment $comment)
    {
        //
    }

    /**
     * Determine whether the user can delete the comment.
     *
     * @param  \Nova\User    $user
     * @param  \Nova\comment $comment
     *
     * @return mixed
     */
    public function delete(User $user, Comment $comment)
    {
        //
    }
}
