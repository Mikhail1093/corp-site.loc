<?php
declare(strict_types=1);

namespace Nova\Http\Middleware\Admin;

use Closure;
use Illuminate\Support\Facades\Auth;
use Nova\User;

/**
 * Class BreadCrumbs
 *
 * @package Nova\Http\Middleware
 */
class CheckAdminPermissions
{
    /**
     * CheckAdminPermissions constructor.
     *
     * @param \Nova\User $user
     */
    /*public function __construct(User $user)
    {

    }*/

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
