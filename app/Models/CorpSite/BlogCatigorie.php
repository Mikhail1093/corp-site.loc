<?php

namespace Nova\Models\CorpSite;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BlogCaterory
 *
 * @package Nova\Models\CorpSite
 */
class BlogCatigorie extends Model
{
    protected $table = 'blog_catigories';

    public function blog()
    {
        return $this->hasMany('Nova\Models\CorpSite\Blog');
    }
}
