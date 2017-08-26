<?php
declare(strict_types=1);

namespace Nova\Models\CorpSite;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vacancy
 *
 * @package Nova\Models\CorpSite
 */
class Vacancy extends Model
{
    public function vacancyRequirement()
    {
        return $this->hasMany('Nova\Models\CorpSite\VacancyRequirement');
    }
}
