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

        $menu = $this->getMainMenu();
        //todo оптимизировать в единый метод получения родительского класса
        $result['footer_menu'] = $this->getFooterListView($menu, 'twits', 'Наша компания');
        $result['menu'] = $menu;
        $vacancies = Vacancy::where(['active' => 1])->get();
        $vacancies->load('vacancyRequirement');

        $result['vacancy'] = array_chunk($vacancies->toArray(), 2);
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
