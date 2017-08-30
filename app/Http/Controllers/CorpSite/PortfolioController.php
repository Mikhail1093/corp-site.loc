<?php
declare(strict_types = 1);

namespace Nova\Http\Controllers\CorpSite;

use Illuminate\Http\Request;
use Nova\Http\Controllers\Controller;

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
    public function execute()
    {
        $result = [];
        $result['menu'] = $this->getMainMenu();

        return view(
            'main_template.portfolio',
            [
                'title'  => 'Наши работы',
                'result' => $result
            ]
        );
    }
}
