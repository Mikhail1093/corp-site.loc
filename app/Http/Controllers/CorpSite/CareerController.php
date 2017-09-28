<?php
declare(strict_types = 1);

namespace Nova\Http\Controllers\CorpSite;

use Illuminate\Http\Request;
use Nova\Http\Controllers\Controller;
use Nova\Models\CorpSite\{
    Vacancy,
    VacancyRequirement
};

/**
 * Class CareerController
 *
 * @package Nova\Http\Controllers\CorpSite
 */
class CareerController extends AppController
{
    /**
     * @const string
     */
    const CAREER_TITLE = 'Карьера';

    /**
     *
     */
    public function execute()
    {
        $result = [];

        $result['menu'] = $this->getMainMenu();
        $vacancies = Vacancy::where(['active' => 1])->get();
        $vacancies->load('vacancyRequirement');

        $result['vacancy'] = $vacancies->toArray();
        dump($result);

        $chainResult['page_name'] = self::CAREER_TITLE;

        $chain = view(
            'main_template.nav_chain',
            [
                'chainResult' => $chainResult
            ]
        );

        return view(
            'main_template.career',
            [
                'title'    => self::CAREER_TITLE,
                'result'   => $result,
                'navChain' => $chain
            ]
        );
    }
}
