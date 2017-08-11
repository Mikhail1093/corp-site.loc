<?php
declare(strict_types=1);

namespace App\Http\Controllers\CorpSite;

use App\Models\CorpSite\MainMenu;
use \App\Http\Controllers\Controller;

/**
 * Class AppController
 *
 * @package App\Http\Controllers\CorpSite
 */
class AppController extends Controller
{
    /**
     * @return bool
     */
    public function execute()
    {
        return '12';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    protected function getMainMenu()
    {
        return MainMenu::where('active', 1)->get();
    }
}
