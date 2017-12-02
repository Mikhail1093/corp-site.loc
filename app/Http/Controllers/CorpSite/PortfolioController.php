<?php
declare(strict_types = 1);

namespace Nova\Http\Controllers\CorpSite;

use Illuminate\Http\Request;
use Nova\Http\Controllers\Controller;
use Nova\Models\CorpSite\Work;

/**
 * Class PortfolioController
 *
 * @package Nova\Http\Controllers\CorpSite
 */
class PortfolioController extends AppController
{
    /**
     *
     */
    public function execute(\Nova\CorpSite\BreadCrumbs $breadCrumbs)
    {
        $result = [];
        $menu = $this->getMainMenu();
        //todo оптимизировать в единый метод получения родительского класса
        $result['footer_menu'] = $this->getFooterListView($menu, 'twits', 'Наша компания');
        $result['menu'] = $menu;
        $result['portfolio'] = Work::where('active', 1)->get()->toArray();

        return view(
            'main_template.portfolio',
            [
                'title'  => 'Кейсы',
                'result' => $result
            ]
        );
    }
}
