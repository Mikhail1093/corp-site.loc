<?php
declare(strict_types = 1);

namespace Nova\Http\Controllers\CorpSite;

use Illuminate\Http\Request;
use Nova\Http\Controllers\Controller;
use Nova\Models\CorpSite\Question;

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
        $result['faq'] = Question::where('active', 1)->get()->toArray();
        dump($result);
        
        return view(
            'main_template.faq',
            [
                'title'  => 'FAQ',
                'result' => $result
            ]
        );
    }
}
