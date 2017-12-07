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
class Blog extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blog';

    /**
     * @var array
     */
    protected $fillable = [
        'preview_text',
        'name',
        'detail_text',
        'active',
        'code',
        'preview_picture',
        'detail_picture',
        'author_id',
        'tags',
        'category_id',
        'rating',
        'blog_catigorie_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function blogCatigorie()
    {
        return $this->belongsTo('Nova\Models\CorpSite\BlogCatigorie');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Nova\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comment()
    {
        return $this->hasMany('Nova\Models\CorpSite\Comment');
    }
}
