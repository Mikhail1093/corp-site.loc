<?php
declare(strict_types = 1);

namespace Nova\Http\Controllers\CorpSite;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Nova\Http\Controllers\Controller;

/**
 * Class PricingController
 *
 * @package Nova\Http\Controllers\CorpSite
 */
class PricingController extends AppController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function execute()
    {
        $result = [];

        $result['menu'] = $this->getMainMenu();

        return view(
            'main_template.pricing',
            [
                'title'  => 'FAQ',
                'result' => $result
            ]
        );
    }
}
