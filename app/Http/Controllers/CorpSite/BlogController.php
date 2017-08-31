<?php
declare(strict_types = 1);

namespace Nova\Http\Controllers\CorpSite;

use Illuminate\Http\Request;
use Nova\Http\Controllers\Controller;

/**
 * Class BlogController
 *
 * @package Nova\Http\Controllers\CorpSite
 */
class BlogController extends AppController
{
    /**
     *
     */
    public function execute()
    {
        $result = [];

        $result['menu'] = $this->getMainMenu();

        return view(
            'main_template.blog_list',
            [
                'title'  => 'Блог',
                'result' => $result
            ]
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function single(Request $request)
    {
        $result = [];

        $result['menu'] = $this->getMainMenu();

        $chain = view('main_template.nav_chain');

        return view(
            'main_template.blog_single',
            [
                'title'    => 'Блог',
                'result'   => $result,
                'navChain' => $chain
            ]
        );
    }
}
