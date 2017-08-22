<?php

namespace Nova\Http\Controllers\CorpSite;

use Illuminate\Http\Request;
use Nova\Http\Controllers\Controller;

use Nova\Models\CorpSite\{
    MainMenu,
    Slide,
    Offer,
    BlogCatigorie
};

/**
 * Class TestingModelsController
 *
 * @package Nova\Http\Controllers\CorpSite
 */
class TestingModelsController extends AppController
{
    public function execute()
    {
        $offers = Offer::where('active', 1)->get();
        dump('=================Offers=====================');
        dump($offers);

        $blogCategories = new BlogCatigorie();

        dump('=================BlogCategories=====================');
        dump(BlogCatigorie::get());
        $blogItems = BlogCatigorie::find(3)->blog;

        dump('=================BlogItemsNameFromCatId3=====================');
        foreach ($blogItems as $blogItem) {
            var_dump($blogItem->name);
        }
    }
}
