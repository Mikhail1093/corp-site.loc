<?php
declare(strict_types = 1);

namespace Nova\Http\Controllers\CorpSite;

use Illuminate\Http\Request;
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
    public function execute()
    {
        $result = [];

        $menu = $this->getMainMenu();
        //todo оптимизировать в единый метод получения родительского класса
        $result['footer_menu'] = $this->getFooterListView($menu, 'twits', 'Наша компания');
        $result['menu'] = $menu;
        $result['services'] = Service::where('active', 1)->get()->toArray();

        dump($result);

        return view(
            'main_template.services',
            [
                'title'  => 'Услуги',
                'result' => $result
            ]
        );
    }
}
