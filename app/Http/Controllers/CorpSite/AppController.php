<?php
declare(strict_types = 1);

namespace Nova\Http\Controllers\CorpSite;

use \Illuminate\Support\Facades\Route;
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
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    protected function getMainMenu()
    {
        $menu = [];
        $menu = MainMenu::where('active', 1)->get()->toArray();
       
        if (count($menu) > 0) {
            foreach ((array)$menu as $key => $item) {
                $menu[$key]['class'] = '';

                if (Route::current()->getName() === $item['alias']) {
                    $menu[$key]['class'] = 'class=active';
                }
            }
        }

        return $menu;
    }
}
