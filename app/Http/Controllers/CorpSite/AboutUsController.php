<?php
declare(strict_types = 1);

namespace Nova\Http\Controllers\CorpSite;

use Illuminate\Http\Request;
use Nova\Http\Controllers\Controller;

/**
 * Class AboutUsController
 *
 * @package Nova\Http\Controllers\CorpSite
 */
class AboutUsController extends AppController
{
    /**
     *
     */
    public function execute()
    {
        $result = [];

        $result['menu'] = $this->getMainMenu();

        return view(
            'main_template.about_us',
            [
                'title'  => 'О нас',
                'result' => $result
            ]
        );
    }
}
