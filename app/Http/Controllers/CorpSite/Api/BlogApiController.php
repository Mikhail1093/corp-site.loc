<?php
declare(strict_types = 1);
namespace Nova\Http\Controllers\CorpSite\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Nova\CorpSite\Api\ApiRepository;
use Nova\CorpSite\AppLogger;
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
    /* protected $log;

     public function __construct(AppLogger $appLogger)
     {
         $this->setLog($appLogger);
     }*/

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function index(Request $request)
    {

        $log = AppLogger::getLogger('grishi');
        $log->debug(
            'REQUEST',
            [
                'url'    => URL::current(),
                'method' => $request->method(),
                'params' => $request->toArray()
            ]
        ); //todo подумать как обернуть, так как ткое логирование будет везеде

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
            $log->error('IncorrectInputDataException', [
                'code'    => $exception->getCode(),
                'message' => $exception->getMessage()
            ]);
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

        //todo - проверять через ПОЛИТИКУ
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
     * @throws \Exception
     */
    public function update(Request $request, $id)
    {
        $log = AppLogger::getLogger('grishi');
        $log->debug(
            'REQUEST',
            [
                'url'    => URL::current(),
                'method' => $request->method(),
                'params' => $request->toArray()
            ]
        );
        $test = [
            'name'           => 'api test',
            'detail_picture' => 'pic_api_test'
        ];


        $t = $request->colst;
        echo '<pre>';
        var_dump($t);
        echo '</pre>';
        echo '<pre>';
        var_dump(\unserialize($t, []));
        echo '</pre>';


        var_dump(__METHOD__);
        echo '</pre>';
        /*echo '<pre>';
        var_dump($request->cols);
        echo '</pre>';*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     * @internal param int $id
     *
     */
    public function destroy(Request $request)
    {
        //todo как подмешать в запрос тип DELETE??
        //todo в родительский класс проверку свойства
        $id = $request->id;

        $post = new ApiRepository(new Blog());

        $postDeleteResult = $post->delete($id);
        echo '<pre>';
        var_dump($postDeleteResult);
        echo '</pre>';

    }

    /**
     * @return mixed
     */
    public function getLog()
    {
        return $this->log;
    }

    /**
     * @param mixed $log
     */
    public function setLog($log)
    {
        $this->log = $log;
    }
}
