<?php
declare(strict_types = 1);

namespace Nova\Http\Controllers\CorpSite;

use Illuminate\Http\Request;
use Nova\Http\Controllers\Controller;
use Nova\User;

use Nova\Models\CorpSite\{
    Role, Work, Blog, Team, Slide, Offer, Skill, Partner, Tariff, Service, Comment, Vacancy, Question, MainMenu, OurService, BlogCatigorie, ContactFeedBack, VacancyRequirement
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
    public function execute(\Nova\CorpSite\BreadCrumbs $breadCrumbs)
    {
        dump('=================User relations=====================');
        $user = new User();
        $user3 = User::find(3);
        dump($user3->load('roles')->toArray()['roles']);

        die;
        dump('=================Сomments from blog=====================');
        $comments = Blog::find(1)->comment;
        dump($comments->toArray());

        dump('=================Pots name from comment=====================');
        $postName = Comment::find(1)->blog;
        dump($postName->name);

        dump('=================Pots name from comment=====================');

        dump('=================vacancyRequirement=====================');
        $vacancyRequirement = Vacancy::find(1)->vacancyRequirement;
        dump($vacancyRequirement);

        dump('=================Vacancy name from vacancyRequirement=====================');
        $vacancyName = VacancyRequirement::find(2)->vacancy;
        dump($vacancyName->name);

        dump('=================Blog with category=====================');
        $blogCategory = Blog::find(1)->blogCatigorie;
        dump($blogCategory);
        
        $author = Blog::find(1)->user;
        dump('=================Post author email=====================');
        dump($author->email);


        dump('=================User=====================');
        dump(User::get());

        $usersPosts = User::find(2)->blog;
        dump($usersPosts);

        dump('\'=================User relations=====================');
        $user = new User();
        $u = User::find(2);
        dump($u->load('blog'));



        dump($user->blog()->where('user_id', 2)->get());

        foreach ($usersPosts as $usersPost) {
            var_dump($usersPost->name);
        }

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
