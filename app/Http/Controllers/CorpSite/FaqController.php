<?php
declare(strict_types = 1);

namespace Nova\Http\Controllers\CorpSite;

use Illuminate\Http\Request;
use Nova\Http\Controllers\Controller;

/**
 * Class FaqController
 *
 * @package Nova\Http\Controllers\CorpSite
 */
class FaqController extends AppController
{
    /**
     *
     */
    public function execute()
    {
        $result = [];
        
        $result['menu'] = $this->getMainMenu();

        return view(
            'main_template.faq',
            [
                'title'  => 'FAQ',
                'result' => $result
            ]
        );
    }
}
