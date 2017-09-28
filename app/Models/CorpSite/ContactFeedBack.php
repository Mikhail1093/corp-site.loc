<?php
declare(strict_types = 1);

namespace Nova\Models\CorpSite;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ContactFeedBack
 *
 * @package Nova\Models\CorpSite
 *
 * @method static find(mixed $key, array $columns = ['*']))
 * @method static create(array $fields)
 */
//todo doc method
/** @noinspection ClassOverridesFieldOfSuperClassInspection */
class ContactFeedBack extends Model
{
    /**
     * @var string
     */
    protected $table = 'contacts_feed_back';

    protected $fillable = [
        'active',
        'user_id',
        'first_name',
        'last_name',
        'email',
        'message'
    ];
}
