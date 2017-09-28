<?php
declare(strict_types = 1);

namespace Nova\Models\CorpSite;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vacancy
 *
 * @package Nova\Models\CorpSite
 *
 * @method get()
 * @method static where()
 * @method static find(mixed $key, array $columns = ['*']))
 */
class Vacancy extends Model
{
    //todo fillible
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vacancyRequirement()
    {
        return $this->hasMany('Nova\Models\CorpSite\VacancyRequirement');
    }
}
