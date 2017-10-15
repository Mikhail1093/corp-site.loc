<?php
declare(strict_types = 1);

namespace Nova\Http\Controllers\CorpSite;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nova\Models\CorpSite\ContactFeedBack;

/**
 * Class ContactController
 *
 * @package Nova\Http\Controllers\CorpSite
 */

/** @noinspection LongInheritanceChainInspection */
class ContactController extends AppController
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function execute()
    {
        $request = new Request();

        if ($request->isMethod('get')) {
            return $this->showFormPage();
        } else {
            return $this->saveFeedBack($request);
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showFormPage()
    {
        if (null !== session('errors')) {
            dump(session('errors')->toArray());
        }

        $result = [];
        $menu = $this->getMainMenu();
        //todo оптимизировать в единый метод получения родительского класса
        $result['footer_menu'] = $this->getFooterListView($menu, 'twits', 'Наша компания');
        $result['menu'] = $menu;

        return view(
            'main_template.contact',
            [
                'title'                     => 'Наши контакты',
                'token'                     => session('_token'),
                'result'                    => $result,
                'errors'                    => (null !== session('errors')) ? session('errors')->toArray() : [],
                'feed_back_message_success' => (null !== session('feed_back_message_success')) ?
                    session('feed_back_message_success') : ''
            ]
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveFeedBack(Request $request)
    {
        $this->validate(
            $request,
            [
                'first_name' => 'required|min:2',
                'last_name'  => 'required|min:2',
                'email'      => 'required|email',
                'message'    => 'required'
            ]
        );

        /** @noinspection PhpDynamicAsStaticMethodCallInspection */
        ContactFeedBack::create(
            [
                'active'     => 1,
                'user_id'    => (false !== Auth::check()) ? Auth::id() : time(), //todo гостевой id (как получить?)
                'first_name' => $request->input('first_name'),
                'last_name'  => $request->input('last_name'),
                'email'      => $request->input('email'),
                'message'    => $request->input('message')
            ]
        );

        return back()->with(
            [
                'feed_back_message_success' => trans('blog.feed_back_message_success')
            ]
        );
    }
}
