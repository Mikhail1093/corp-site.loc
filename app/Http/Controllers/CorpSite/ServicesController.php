<?php
declare(strict_types = 1);

namespace Nova\Http\Controllers\CorpSite;

use Illuminate\Http\Request;
use Nova\Http\Middleware\BreadCrumbs;
use Nova\Models\CorpSite\Service;
use Nova\Http\Controllers\Controller;

/**
 * Class ServicesController
 *
 * @package Nova\Http\Controllers\CorpSite
 */
class ServicesController extends AppController
{
    /**
     *
     */
    public function execute(\Nova\CorpSite\BreadCrumbs $breadCrumbs)
    {
        dump($breadCrumbs->getBreadCrumbs());
        $result = [];

        $menu = $this->getMainMenu();
        //todo оптимизировать в единый метод получения родительского класса
        $result['footer_menu'] = $this->getFooterListView($menu, 'twits', 'Наша компания');
        $result['menu'] = $menu;
        $result['services'] = Service::where('active', 1)->get()->toArray();

        //dump($result);

        return view(
            'main_template.services',
            [
                'title'  => 'Услуги',
                'result' => $result
            ]
        );
    }

    public function test(\Nova\CorpSite\BreadCrumbs $breadCrumbs)
    {
        dump($breadCrumbs->getBreadCrumbs());
    }
}
