<?php
declare(strict_types = 1);

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

/** @noinspection PhpUndefinedClassInspection */
class Token extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Nova\User');
    }
}
