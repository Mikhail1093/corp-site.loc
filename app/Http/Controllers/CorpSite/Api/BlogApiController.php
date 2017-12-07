<?php

namespace Nova\Http\Controllers\CorpSite\Api;

use Illuminate\Http\Request;
use Nova\CorpSite\Api\ApiRepository;
use Nova\Exceptions\IncorrectInputDataException;
use Nova\Models\CorpSite\Blog;
use Nova\Http\Controllers\CorpSite\AppController;
use Nova\Models\CorpSite\Token;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class BlogApiController
 *
 * @package Nova\Http\Controllers\CorpSite\Api
 */

/** @noinspection LongInheritanceChainInspection */
class BlogApiController extends AppApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $this->checkApiKey($request['key']);
            $blog = new ApiRepository(new Blog());

            try {
                $result['data'] = $blog->getAll(
                    [
                        'id',
                        'created_at'
                    ]
                );

                $result['status'] = 200;

                if (0 === count($result['data'])) {
                    $result['status'] = 404;
                }
            } catch (IncorrectInputDataException $exception) {
                //todo лог
                $result['data'] = ['error' => $exception->getMessage()];
                $result['status'] = 500; //todo подумать
            }
        } catch (IncorrectInputDataException $exception) {
            //todo лог
            $result['data'] = ['error' => $exception->getMessage()];
            $result['status'] = $exception->getCode(); //todo подумать
        }

        return response()->json($result['data'], $result['status']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     * @throws \Nova\Exceptions\IncorrectInputDataException
     */
    public function create(Request $request): JsonResponse
    {
        //todo DTO объект для значений блога
        //todo свои проелки консистентности объекта

        try { //todo вынести в родительский класс и получить через parent?
            $this->checkApiKey($request['key']);
        } catch (IncorrectInputDataException $exception) {
            //todo лог
            dump('error api key'); //todo
        }

        //for tests
        $testData = [
            'preview_text'      => 'test preview text',
            'name'              => 'test name',
            'detail_text'       => 'test derail text',
            'active'            => 1,
            'code'              => 'test_preview_text',
            'preview_picture'   => 'test-api',
            'detail_picture'    => 'test',
            'author_id'         => 2,
            'tags'              => 'test_tags',
            'category_id'       => 3,
            'rating'            => 2,
            'blog_catigorie_id' => 3,
            'user_id'           => 2 //todo кто добавил (чей токен)
        ];

        $newPost = new ApiRepository(new Blog());

        //todo try catch?? или хватит DTO ?
        $newPostResult = $newPost->create($testData);

        if ($newPostResult instanceof Blog) {
            return response()->json([
                'result' => 'success',
                'data'   => ['id' => $newPostResult->id]
            ]);
        }

        return response()->json(
            [
                'result' => 'error', //todo это какая-то внутренняя ( external error )
                'data'   => []
            ],
            500
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        var_dump('store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Blog::where('id', $id)->get()->toArray();

        $status = 200;

        if (0 === count($post)) {
            $status = 404;
        }

        return response()->json($post, $status);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //todo как подмешать в запрос тип DELETE??
        var_dump($request->id);
        die;
        $post = new ApiRepository(new Blog());

        $postDeleteResult = $post->delete();
        dump($postDeleteResult);
    }
}
