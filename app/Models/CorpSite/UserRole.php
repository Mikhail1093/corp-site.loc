<?php
declare(strict_types=1);

namespace Nova\Models\CorpSite;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Blog
 *
 * @package Nova\Models\CorpSite
 *
 * @method get()
 * @method static where()
 * @method paginate(int $count)
 * @method static find(mixed $key, array $columns = ['*']))
 */
class UserRole extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'role_user';
}
