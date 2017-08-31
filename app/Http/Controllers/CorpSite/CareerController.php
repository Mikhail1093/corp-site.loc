<?php
declare(strict_types = 1);

namespace Nova\Http\Controllers\CorpSite;

use Illuminate\Http\Request;
use Nova\Http\Controllers\Controller;

/**
 * Class CareerController
 *
 * @package Nova\Http\Controllers\CorpSite
 */
class CareerController extends AppController
{
    /**
     *
     */
    public function execute()
    {
        $result = [];

        $result['menu'] = $this->getMainMenu();

        return view(
            'main_template.career',
            [
                'title'  => 'Карьерра',
                'result' => $result
            ]
        );
    }
}
