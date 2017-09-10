<?php
declare(strict_types = 1);

namespace Nova\Http\Controllers\CorpSite;

use Illuminate\Http\Request;
use Nova\Http\Controllers\Controller;
use Nova\Models\CorpSite\{
    Blog,
    BlogCatigorie
};

/**
 * Class BlogController
 *
 * @package Nova\Http\Controllers\CorpSite
 */
class BlogController extends AppController
{
    /**
     *
     */
    public function execute()
    {
        $result = [];

        $result['menu'] = $this->getMainMenu();

        $posts = Blog::where('active', 1)->paginate(3);

        $posts->load(
            [
                'user',
                'blogCatigorie',
                'comment'
            ]
        );

        $result['posts'] = $posts->toArray()['data'];

        array_walk($result['posts'], function (&$item) {
            $item['comment'] = count($item['comment']);
        });

        dump($result['posts']);

        //todo правый бар в отдельное представление

        return view(
            'main_template.blog_list',
            [
                'title'  => 'Блог',
                'result' => $result
            ]
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function single(Request $request)
    {
        $result = [];

        $post = Blog::where('code', $request->code)->get();

        //todo если app_deug = true, то писать трейс
        if (0 === count($post)) {
            abort(404);
        }

        $post->load(
            [
                'user',
                'blogCatigorie',
                'comment'
            ]
        );

        $result['menu'] = $this->getMainMenu();
        $result['post'] = $post->toArray()[0];
        dump($result);
        dump($this->getCategories());
        dump($this->getTagsCloud());
        $chain = view('main_template.nav_chain');

        //todo правый бар в отдельное представление
        //todo правый бар в отдельное представление - топ 3 поста находить по рейтигу и метод расчета рейтинга

        return view(
            'main_template.blog_single',
            [
                'title'    => 'Блог',
                'result'   => $result,
                'navChain' => $chain
            ]
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function saveComment(Request $request)
    {
        //todo
    }

    /**
     * @return array
     */
    private function getCategories()
    {
        return BlogCatigorie::where('active', 1)->get()->toArray();
    }

    /**
     * Получить список тегов из таблицы blog, поле tags
     *
     * @return mixed
     */
    private function getTagsCloud()
    {
        //todo blod в константы
        $allTags = \DB::table('blog')->select('tags')->distinct()->get()->toArray();

        $tagsResult = [];

        foreach ((array)$allTags as $key => $tags) {
            $tagsArray = explode(',', $tags->tags);

            foreach ((array)$tagsArray as $tag) {
                $tagsResult[] = trim($tag);
            }
        }

        $tagsResult = array_unique($tagsResult);

        return $tagsResult;
    }
}
