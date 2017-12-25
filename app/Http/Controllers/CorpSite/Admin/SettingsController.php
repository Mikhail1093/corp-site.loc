<?php
declare(strict_types=1);

namespace Nova\Http\Controllers\CorpSite\Admin;

use Illuminate\Http\Request;
use Nova\Http\Controllers\Controller;
use Nova\User;

/**
 * Class SettingsController
 */
class SettingsController extends Controller
{
    /**
     * @return string
     */
    public function index(User $user): string
    {
        $user->isAdmin($user);
        return __METHOD__;
    }
}
