<?php
declare(strict_types=1);

namespace Nova\Http\Controllers\CorpSite;

use Nova\Models\CorpSite\MainMenu;
use \Nova\Http\Controllers\Controller;

/**
 * Class AppController
 *
 * @package Nova\Http\Controllers\CorpSite
 */
class AppController extends Controller
{
    /**
     * @return bool
     */
    public function execute()
    {
        //return '12';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    protected function getMainMenu()
    {
        return MainMenu::where('active', 1)->get();
    }
}
