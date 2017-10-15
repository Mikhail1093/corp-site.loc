<?php

namespace Nova\Http\Controllers\CorpSite\Api;

use Illuminate\Http\Request;
use Nova\CorpSite\Api\ApiRepository;
use Nova\Exceptions\IncorrectInputDataException;
use Nova\Models\CorpSite\Blog;
use Nova\Http\Controllers\CorpSite\AppController;
use Nova\Models\CorpSite\Token;

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
                $result['data'] = $blog->getAll();
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        var_dump('create');
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
    public function destroy($id)
    {
        //
    }
}
