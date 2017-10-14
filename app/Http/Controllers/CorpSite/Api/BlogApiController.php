<?php

namespace Nova\Http\Controllers\CorpSite\Api;

use Illuminate\Http\Request;
use Nova\Models\CorpSite\Blog;
use Nova\Http\Controllers\CorpSite\AppController;

/**
 * Class BlogApiController
 *
 * @package Nova\Http\Controllers\CorpSite\Api
 */
class BlogApiController extends AppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Blog::where('active', 1)->paginate(3);

        return response()->json($posts->toArray()['data']);
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
