<?php
declare(strict_types = 1);

namespace Nova\Models\CorpSite;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 *
 * @package Nova\Models\CorpSite
 *
 * @method static find(mixed $key, array $columns = ['*']))
 * @method static create(array $fields)
 */
class Comment extends Model
{
    /**
     * @var array - поля, доступные для записи
     */
    protected $fillable = [
        'user_id',
        'blog_id',
        'text',
        'active'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function blog()
    {
        return $this->belongsTo('Nova\Models\CorpSite\Blog');
    }
}
