<?php
declare(strict_types = 1);

namespace Nova\Http\Controllers\CorpSite;

use Nova\Models\CorpSite\MainMenu;
use \Nova\Http\Controllers\Controller;
use \Illuminate\Support\Facades\Route;

//todo вынести постовряющиеся методы типа рультата зеленого title
/**
 * Class AppController
 *
 * @package Nova\Http\Controllers\CorpSite
 */
class AppController extends Controller
{
    /**
     *
     */
    public function execute()
    {
        //todo вынести 'active', 1 в массив ['active', 1] в поле
        //todo вынести получение меню и и цепочки навигацииё
    }

    /**
     * Получить представление для списка в footer главного шаблона
     *
     * @param string $blockId - id div
     * @param string $title   - заголовок
     * @param array  $data    - массив данных
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function getFooterListView(array $data = [], string $blockId = 'twits', string $title = 'title')
    {
        dump($data);
        return view(
            'main_template.sections.footer_list',
            [
                'block_id' => $blockId,
                'title'    => $title,
                'result'   => $data
            ]
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    protected function getMainMenu()
    {
        //todo Добавить в настройки максимальныю длину меню
        // если пунтктов больше, то упоковывать его в "more"

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
