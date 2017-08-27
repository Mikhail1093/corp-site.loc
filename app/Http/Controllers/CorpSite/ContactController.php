<?php
declare(strict_types = 1);

namespace Nova\Http\Controllers\CorpSite;

use Illuminate\Http\Request;
use Nova\Http\Controllers\Controller;

/**
 * Class ContactController
 *
 * @package Nova\Http\Controllers\CorpSite
 */
class ContactController extends AppController
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function execute(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->showFormPage();
        } else {
            $this->saveFeedBack($request);
        }
    }

    /**
     *
     */
    public function showFormPage()
    {
    }

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function saveFeedBack(Request $request)
    {
    }
}
