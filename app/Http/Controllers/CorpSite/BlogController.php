<?php
declare(strict_types = 1);

namespace Nova\Http\Controllers\CorpSite;

use Illuminate\Http\Request;
use Nova\Http\Controllers\Controller;
use Nova\Models\CorpSite\{
    Blog, BlogCatigorie, Partner
};

/**
 * Class BlogController
 *
 * @package Nova\Http\Controllers\CorpSite
 */
class BlogController extends AppController
{
    /**
     * @const string
     */
    const BLOG_LOST_TITLE = 'Блог';

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

        $rightBarResult['categories'] = $this->getCategories();
        $rightBarResult['tagCloud'] = $this->getTagsCloud();

        $chainResult['page_name'] = self::BLOG_LOST_TITLE;

        $chain = view(
            'main_template.nav_chain',
            [
                'chainResult' => $chainResult
            ]
        );

        $rightBar = view('main_template.right_bar', $rightBarResult);

        return view(
            'main_template.blog_list',
            [
                'title'    => self::BLOG_LOST_TITLE,
                'result'   => $result,
                'navChain' => $chain,
                'rightBar' => $rightBar
            ]
        );
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
        //todo blog в константы
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

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function single(Request $request)
    {
        if ($request->isMethod('POST')) {
            return $this->saveComment($request);
        } else {
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
            $rightBarResult['categories'] = $this->getCategories();
            $rightBarResult['tagCloud'] = $this->getTagsCloud();

            $chainResult['page_name'] = $result['post']['name'];

            $chain = view(
                'main_template.nav_chain',
                [
                    'chainResult' => $chainResult
                ]
            );

            $rightBar = view('main_template.right_bar', $rightBarResult);

            //todo правый бар в отдельное представление - топ 3 поста находить по рейтигу и метод расчета рейтинга

            return view(
                'main_template.blog_single',
                [
                    'title'    => 'Блог',
                    'result'   => $result,
                    'navChain' => $chain,
                    'rightBar' => $rightBar,
                    'token'    => csrf_token()
                ]
            );
        }

    }

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function saveComment(Request $request)
    {
        //todo верстка формы через forms & html
        //todo валидация через laravel validate
        var_dump($request->input());
    }
}
