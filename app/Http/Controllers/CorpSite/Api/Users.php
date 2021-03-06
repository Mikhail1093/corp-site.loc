<?php
declare(strict_types = 1);

namespace Nova\Http\Controllers\CorpSite\Api;

use Nova\Http\Controllers\CorpSite\AppController;

/**
 * Class MainPageController
 *
 * @package Nova\Http\Controllers\CorpSite
 */

/** @noinspection LongInheritanceChainInspection */
class Users extends AppController
{
    /**
     * @return \Illuminate\Support\Facades\View
     */
    /** @noinspection PhpMissingParentCallCommonInspection */
    public function execute()
    {
        return response()->json([
            'name'    => 'user',
            'email'   => 'sdf@sfsd.ri',
            'address' => [
                'street' => 'ostr',
                'house'  => 213
            ]
        ]);
    }
}
