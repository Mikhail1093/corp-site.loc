<?php
declare(strict_types = 1);

namespace Nova\Http\Controllers\CorpSite;

    /*use Nova\Models\CorpSite\{
        MainMenu,
        Slide
    };*/
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

        $result['menu'] = $this->getMainMenu();

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
