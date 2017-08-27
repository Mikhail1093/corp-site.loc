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
    public function execute()
    {
        //результирующий массив гдавной страницы
        $result = [];

        //todo оптимизировать в единый метод получения родительского класса
        $result['menu'] = $this->getMainMenu()->toArray();
        $result['slider'] = Slide::where('active', 1)->get()->toArray();
        $result['offers'] = Offer::where('active', 1)->get()->toArray();
        $result['works'] = Work::where(['active' => 1, 'show_on_main_page' => 1])->get()->toArray();
        $result['partners'] = Partner::where('active', 1)->get()->toArray();

        
        return view(
            'main_template.index',
            [
                'title'  => 'test title',
                'result' => $result
            ]
        );
    }
}
