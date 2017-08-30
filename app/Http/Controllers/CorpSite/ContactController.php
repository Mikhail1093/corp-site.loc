<?php
declare(strict_types = 1);

namespace Nova\Http\Controllers\CorpSite;

use Illuminate\Http\Request;

/**
 * Class ContactController
 *
 * @package Nova\Http\Controllers\CorpSite
 */
class ContactController extends AppController
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function execute()
    {
        $request = new Request();

        if ($request->isMethod('get')) {
            return $this->showFormPage();
        } else {
            return $this->saveFeedBack($request);
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showFormPage()
    {
        $result = [];
        $result['menu'] = $this->getMainMenu();

        return view(
            'main_template.contact',
            [
                'title'  => 'Наши контакты',
                'result' => $result
            ]
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function saveFeedBack(Request $request)
    {
    }
}
