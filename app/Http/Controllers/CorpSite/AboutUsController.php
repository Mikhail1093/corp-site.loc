<?php
declare(strict_types = 1);

namespace Nova\Http\Controllers\CorpSite;

use Illuminate\Http\Request;
use Nova\Http\Controllers\Controller;

use Nova\Models\CorpSite\{
    Skill,
    Team,
    OurService
};

/**
 * Class AboutUsController
 *
 * @package Nova\Http\Controllers\CorpSite
 */
class AboutUsController extends AppController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function execute()
    {
        $result = [];

        $menu = $this->getMainMenu();
        //todo оптимизировать в единый метод получения родительского класса
        $result['footer_menu'] = $this->getFooterListView($menu, 'twits', 'Наша компания');
        $result['menu'] = $menu;
        $result['our_skills'] = Skill::where('active', 1)->get()->toArray();
        $result['team'] = Team::where('active', 1)->get()->toArray();
        $result['our_services'] = OurService::where('active', 1)->get()->toArray();

        dump($result);
        

        return view(
            'main_template.about_us',
            [
                'title'  => 'О нас',
                'result' => $result
            ]
        );
    }
}
