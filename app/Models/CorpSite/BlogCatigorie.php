<?php
declare(strict_types = 1);

namespace Nova\Models\CorpSite;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BlogCaterory
 *
 * @package Nova\Models\CorpSite
 */
//todo doc method and fillible
class BlogCatigorie extends Model
{
    protected $table = 'blog_catigories';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function blog()
    {
        return $this->hasMany('Nova\Models\CorpSite\Blog');
    }
}
