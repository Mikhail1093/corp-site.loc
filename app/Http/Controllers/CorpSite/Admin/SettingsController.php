<?php
declare(strict_types=1);

namespace Nova\Http\Controllers\CorpSite\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nova\Http\Controllers\Controller;
use Nova\User;

/**
 * Class SettingsController
 */
class SettingsController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->setUser($user);
    }

    /**
     * @param \Nova\User $user
     *
     * @return string
     */
    public function index(User $user)
    {
        if ($user->isAdmin(Auth::user())) {
            return 'setting page';
        }

        return 'Доступа нет';
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }
}
