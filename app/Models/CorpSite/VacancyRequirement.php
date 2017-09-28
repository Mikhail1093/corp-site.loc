<?php
declare(strict_types=1);

namespace Nova\Models\CorpSite;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VacancyRequirement
 *
 * @package Nova\Models\CorpSite
 */
class VacancyRequirement extends Model
{
    //todo doc method and fillible
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vacancy()
    {
        return $this->belongsTo('Nova\Models\CorpSite\Vacancy');
    }
}
