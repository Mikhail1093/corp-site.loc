<?php
declare(strict_types = 1);

namespace Nova\Http\Controllers\CorpSite;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Nova\Http\Controllers\Controller;
use Nova\Models\CorpSite\Tariff;

/**
 * Class PricingController
 *
 * @package Nova\Http\Controllers\CorpSite
 */
class PricingController extends AppController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function execute()
    {
        $result = [];

        $result['menu'] = $this->getMainMenu();
        $result['pricing'] = Tariff::where('active', 1)->get()->toArray();

        // парсим json из БД
        array_walk($result['pricing'], function (&$item) {
            if (json_decode($item['description'])) {
                $item['description'] = json_decode($item['description']);
            } else {
                $item['description'] = [];
            }
        });

        return view(
            'main_template.pricing',
            [
                'title'  => 'Цены',
                'result' => $result
            ]
        );
    }
}
