<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * PostController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        //
        $attributes = $request->all();

        $this->validate(request(),[
            'body' => 'required',
        ]);

        try {
            $post = Post::create($attributes);
            return response()->json(apiResponseMessage(trans('post created successfully'), []), 200);
        } catch (\Exception $e) {
            return response()->json(apiResponseMessage(trans('failed to create a post'), ['error' => $e]), 400);
        }

        /*if ($request->hasFile('photo')) {
            foreach ($request->file('photo') as $file) {
                $post->addMedia($file)->preservingOriginal()->toMediaCollection();
            }
        }*/
    }

    /**
     * Display the specified resource.
     *
     * @param $post_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($post_id)
    {
        $post =  Post::find($post_id);
        if (!$post){
            return response()->json(apiResponseMessage(trans('failed to retrieve a post'), ['error' => 'not valid post id']), 400);
        }else{
            return response()->json(apiResponseMessage(trans('post retrieved successfully'), ['post' => $post]), 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $post_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $post_id)
    {
        $post =  Post::find($post_id);
        if (!$post){
            return response()->json(apiResponseMessage(trans('failed to update post'), ['error' => 'not valid post id']), 400);
        }
        $attributes = $request->all();

        try {
            $post = $post->update($attributes);
            return response()->json(apiResponseMessage(trans('post updated successfully'), []), 200);
        } catch (\Exception $e) {
            return response()->json(apiResponseMessage(trans('failed to update post'), ['error' => $e]), 400);
        }
    }

    /**
     * Remove the specified resource from storag
     *
     * @param $post_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($post_id)
    {
        $post =  Post::find($post_id);
        if (!$post){
            return response()->json(apiResponseMessage(trans('failed to delete a post'), ['error' => 'not valid post id']), 400);
        }else{
            $post->delete();
            return response()->json(apiResponseMessage(trans('post deleted successfully'), []), 200);

        }
    }
}
