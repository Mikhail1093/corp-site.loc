<?php
declare(strict_types = 1);

namespace Nova\Http\Controllers\CorpSite;

use Illuminate\Http\Request;
use Nova\Http\Controllers\Controller;

use Nova\Models\CorpSite\{
    Work,
    Blog,
    Team,
    Slide,
    Offer,
    Skill,
    Partner,
    Tariff,
    Service,
    Comment,
    Vacancy,
    Question,
    MainMenu,
    OurService,
    BlogCatigorie,
    ContactFeedBack,
    VacancyRequirement
};

/**
 * Class TestingModelsController
 *
 * @package Nova\Http\Controllers\CorpSite
 */
class TestingModelsController extends AppController
{
    /**
     *
     */
    public function execute()
    {
        $offers = Offer::where('active', 1)->get();
        dump('=================Offers=====================');
        dump($offers);

        dump('=================BlogCategories=====================');
        dump(BlogCatigorie::get());
        $blogItems = BlogCatigorie::find(3)->blog;

        dump('=================BlogItemsNameFromCatId3=====================');
        foreach ($blogItems as $blogItem) {
            var_dump($blogItem->name);
        }

        dump('=================Blog=====================');
        dump(Blog::get());

        dump('=================Comment=====================');
        dump(Comment::where('active', 1)->get());

        dump('=================ContactFeedBack=====================');
        dump(ContactFeedBack::get());

        dump('=================MainMenu=====================');
        dump(MainMenu::get());

        dump('=================OurServices====================');
        dump(OurService::get());

        dump('=================Work====================');
        dump(Work::get());

        dump('=================Slide====================');
        dump(Slide::get());

        dump('=================Team====================');
        dump(Team::get());

        dump('=================Skill====================');
        dump(Skill::get());

        dump('=================Partner====================');
        dump(Partner::get());

        dump('=================Tariff====================');
        dump(Tariff::get());

        dump('=================Service====================');
        dump(Service::get());

        dump('=================Vacancy====================');
        dump(Vacancy::get());

        dump('=================VacancyRequirement====================');
        dump(VacancyRequirement::get());

        dump('=================Question====================');
        dump(Question::get());
    }
}
