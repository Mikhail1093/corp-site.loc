<?php
declare(strict_types = 1);

namespace Nova\Models\CorpSite;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Blog
 *
 * @package Nova\Models\CorpSite
 */
class Blog extends Model
{
    protected $table = 'blog';

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
