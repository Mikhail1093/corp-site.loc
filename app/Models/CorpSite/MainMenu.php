<?php
declare(strict_types=1);

namespace Nova\Models\CorpSite;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MainMenu
 *
 * @package Nova\Models\CorpSite
 *
 * @method get()
 * @method static where($column, $operator = null, $value = null, $boolean = 'and')
 * @method paginate(int $count)
 * @method static find(mixed $key, array $columns = ['*']))
 */

/** @noinspection ClassOverridesFieldOfSuperClassInspection */
class MainMenu extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'main_menu';
    //todo fillible
}
