<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
        $posts = Post::all();
        return response()->json(apiResponseMessage(trans('posts list'), ['posts' => $posts]), 200);

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
            return response()->json(apiResponseMessage(trans('post created successfully'), ['post' => $post]), 200);
        } catch (\Exception $e) {
            return response()->json(apiResponseMessage(trans('failed to create a post'), ['error' => $e->getMessage()]), 400);
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
     * @param  \App\Models\Post  $post
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
            $post->update($attributes);
            return response()->json(apiResponseMessage(trans('post updated successfully'), ['post' => $post]), 200);
        } catch (\Exception $e) {
            return response()->json(apiResponseMessage(trans('failed to update post'), ['error' => $e->getMessage()]), 400);
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
            $comments = $post->comments;
            $post->delete();
            foreach ($comments as $comment){
                $comment->delete();
            }
            return response()->json(apiResponseMessage(trans('post deleted successfully'), []), 200);

        }
    }

    /**
     * @param $post_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPostComments($post_id)
    {
        try{
            $post = Post::find($post_id);
            $comments = $post->comments;
            return response()->json(apiResponseMessage(trans('post\'s comments'), ['comments' => $comments]), 200);
        }catch (\Exception $e){
            return response()->json(apiResponseMessage(trans('error'), ['error' => $e->getMessage()]), 400);
        }
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMyPost()
    {
        try{
            $posts = Post::where('created_by', '=', user()->id)->get();
            return response()->json(apiResponseMessage(trans('my posts'), ['posts' => $posts]), 200);
        }catch (\Exception $e){
            return response()->json(apiResponseMessage(trans('error'), ['error' => $e->getMessage()]), 400);
        }
    }
}
