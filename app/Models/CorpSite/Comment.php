<?php
declare(strict_types=1);

namespace Nova\Models\CorpSite;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 *
 * @package Nova\Models\CorpSite
 */
class Comment extends Model
{
    public function blog()
    {
        return $this->belongsTo('Nova\Models\CorpSite\Blog');
    }
}
