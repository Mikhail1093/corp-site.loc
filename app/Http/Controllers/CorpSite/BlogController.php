<?php
declare(strict_types = 1);

namespace Nova\Http\Controllers\CorpSite;

use Illuminate\Http\Request;
use Nova\Http\Controllers\Controller;
use Nova\Http\Requests\CommentValidate;
use Nova\Models\CorpSite\{
    Blog,
    BlogCatigorie,
    Comment
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

        $menu = $this->getMainMenu();
        //todo оптимизировать в единый метод получения родительского класса
        $result['footer_menu'] = $this->getFooterListView($menu, 'twits', 'Наша компания');
        $result['menu'] = $menu;

        $posts = Blog::where('active', 1)->paginate(3);

        $posts->load(
            [
                'user',
                'blogCatigorie',
                'comment'
            ]
        );

        $result['posts'] = $posts->toArray()['data'];

        //todo как получить количесвто коментов проще
        array_walk($result['posts'], function (&$item) {
            $item['comment'] = count($item['comment']);
            $item['created_at'] = date('M j, Y', (int)strtotime($item['created_at']));
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
        $blog = new Blog();

        $allTags = \DB::table($blog->getTable())->select('tags')->distinct()->get()->toArray();

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
        //dump(session()->all());
        if (null !== session('errors')) {
            dump(session('errors')->toArray());
        }

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

            $menu = $this->getMainMenu();
            //todo оптимизировать в единый метод получения родительского класса
            $result['footer_menu'] = $this->getFooterListView($menu, 'twits', 'Наша компания');
            $result['menu'] = $menu;
            $result['post'] = $post->toArray()[0];

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
                    'token'    => session('_token')
                ]
            );
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveComment(Request $request) //Через фильтр CommentValidate
    {
        //todo верстка формы через forms & html
        //todo валидация через laravel validate

        /*$validator = Validator::make(
            ['name' => $request->input('name')],
            ['name' => ['min:5']]
        );
        dump($validator);
        */

        $this->validate(
            $request,
            [
                'email'   => 'email',
                'name'    => 'required',
                'message' => 'required'
            ],
            [
                'Некорректно введен email',
                'Имя не заполненно',
                'Поле сообщение не заполненно'
            ]
        );

        $comment = Comment::create(
            [
                //todo 'name'    => $request->input('name'),
                'text'    => $request->input('message'),
                'user_id' => 2,
                'active'  => 0,
                'blog_id' => 1
            ]
        );

        //todo заменрить сколько где больше запросов и что дольше выполняется
        /*
         * Созхранение черех присвоение свойств
         */
        //==========================================
        /*$comment = new Comment();
         $comment->text = $request->input('message');
         $comment->user_id = 2;
         $comment->active = 0;
         $comment->blog_id = 1;

         $comment->save();*/
        //==========================================
        dump($request->input());

        //todo проверка, если неудачно записалось
        return back()->with([
            'comment_add_success' => trans('blog.comment_add_success')
        ]);
    }
}
