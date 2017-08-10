<?php
declare(strict_types=1);

namespace App\Http\Controllers\CorpSite;

/**
 * Class MainPageController
 *
 * @package App\Http\Controllers\CorpSite
 */

/** @noinspection LongInheritanceChainInspection */
class MainPageController extends AppController
{
    /**
     * @return \Illuminate\Support\Facades\View
     */
    /** @noinspection PhpMissingParentCallCommonInspection */
    public function execute()
    {
        return view('main_template.index');
    }
}
