<?php
declare(strict_types = 1);

namespace Nova\Http\Controllers\CorpSite;

use Illuminate\Http\Request;
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

        $result['menu'] = $this->getMainMenu();

        return view(
            'main_template.services',
            [
                'title'  => 'Услуги',
                'result' => $result
            ]
        );
    }
}
