<?php

namespace Nova;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Nova\Models\CorpSite\Role;
use Nova\Models\CorpSite\Shop\Order;
use Nova\Models\CorpSite\UserRole;

/**
 * Class User
 *
 * @package Nova
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function blog()
    {
        return $this->hasMany('Nova\Models\CorpSite\Blog');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function apiToken()
    {
        return $this->hasMany('Nova\Models\CorpSite\Token');
    }

    /**
     * @param \Nova\User $user
     *
     * @return bool
     */
    public function isAdmin(User $user): bool
    {
        //todo проверить если юзер вообще в группе
        foreach ((array)$user->load('roles')->toArray()['roles'] as $role) {
            if ('admin' === $role['code']) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function basket(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'basket');
    }
}
