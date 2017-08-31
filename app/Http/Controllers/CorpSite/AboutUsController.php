<?php
declare(strict_types = 1);

namespace Nova\Http\Controllers\CorpSite;

use Illuminate\Http\Request;
use Nova\Http\Controllers\Controller;

use Nova\Models\CorpSite\{
    Skill,
    Team,
    OurService
};

/**
 * Class AboutUsController
 *
 * @package Nova\Http\Controllers\CorpSite
 */
class AboutUsController extends AppController
{
    /**
     *
     */
    public function execute()
    {
        $result = [];

        $result['menu'] = $this->getMainMenu();
        $result['our_skills'] = Skill::where('active', 1)->get()->toArray();
        $result['team'] = Team::where('active', 1)->get()->toArray();
        $result['our_services'] = OurService::where('active', 1)->get()->toArray();

        dump($result);

        return view(
            'main_template.about_us',
            [
                'title'  => 'О нас',
                'result' => $result
            ]
        );
    }
}
