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
    public function execute()
    {
        $result = [];
        $result['menu'] = $this->getMainMenu();
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
