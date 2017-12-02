<?php
declare(strict_types = 1);

namespace Nova\Http\Controllers\CorpSite;

use Nova\Models\CorpSite\{
    Slide,
    Offer,
    Work,
    Partner
};

/**
 * Class MainPageController
 *
 * @package Nova\Http\Controllers\CorpSite
 */

/** @noinspection LongInheritanceChainInspection */
class MainPageController extends AppController
{
    /**
     * @return \Illuminate\Support\Facades\View
     */
    /** @noinspection PhpMissingParentCallCommonInspection */
    public function execute(\Nova\CorpSite\BreadCrumbs $breadCrumbs)
    {
        //результирующий массив гдавной страницы
        $result = [];

        $this->getBlogArchive();
        $menu = $this->getMainMenu();
        //todo оптимизировать в единый метод получения родительского класса
        $result['footer_menu'] = $this->getFooterListView($menu, 'twits', 'Наша компания');
        $result['menu'] = $menu;

        $result['slider'] = Slide::where('active', 1)->get()->toArray();
        $result['offers'] = array_chunk(Offer::where('active', 1)->get()->toArray(), 3);
        $result['works'] = Work::where(['active' => 1, 'show_on_main_page' => 1])->get()->toArray();
        $result['partners'] = Partner::where('active', 1)->get()->toArray();


        //файлы должны быть в storage и пути к ним через storage_path();
        dump($result);

        return view(
            'main_template.index',
            [
                'title'  => 'test title',
                'result' => $result
            ]
        );
    }
}
