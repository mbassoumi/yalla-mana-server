<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    /**
     * CommentController constructor.
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
        $comments = Comment::all();
        return response()->json(apiResponseMessage(trans('comments list'), ['comments' => $comments]), 200);

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
        $attributes = $request->all();
        $post_id = $attributes['post_id'];
        $this->validate(request(),[
            'body' => 'required|min:2',
        ]);
        try{
            $comment = Comment::create($attributes);
            $post = Post::find($post_id);
            $post->addComment($comment->body);
            return response()->json(apiResponseMessage(trans('comment created successfully'), ['comment' => $comment]), 200);
        }catch (\Exception $e){
            return response()->json(apiResponseMessage(trans('failed to create a comment'), ['error' => $e->getMessage()]), 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show($comment_id)
    {
        $comment =  Comment::find($comment_id);
        if (!$comment){
            return response()->json(apiResponseMessage(trans('failed to retrieve a comment'), ['error' => 'not valid comment id']), 400);
        }else{
            return response()->json(apiResponseMessage(trans('comment retrieved successfully'), ['comment' => $comment]), 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $comment_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $comment_id)
    {
        $comment=  Comment::find($comment_id);
        if (!$comment){
            return response()->json(apiResponseMessage(trans('failed to update a comment'), ['error' => 'not valid comment id']), 400);
        }
        $attributes = $request->all();

        try {
            $comment->update($attributes);
            return response()->json(apiResponseMessage(trans('comment updated successfully'), ['comment' => $comment]), 200);
        } catch (\Exception $e) {
            return response()->json(apiResponseMessage(trans('failed to update comment'), ['error' => $e->getMessage()]), 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $comment_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($comment_id)
    {
        $comment =  Comment::find($comment_id);
        if (!$comment){
            return response()->json(apiResponseMessage(trans('failed to delete a comment'), ['error' => 'not valid comment id']), 400);
        }else{
            $comment->delete();
            return response()->json(apiResponseMessage(trans('comment deleted successfully'), []), 200);

        }
    }

    public function getCommentPost($comment_id)
    {
        try{
            $comment = Comment::find($comment_id);
            $post = $comment->post;
            return response()->json(apiResponseMessage(trans('comment\'s post'), ['post' => $post]), 200);
        }catch (\Exception $e){
            return response()->json(apiResponseMessage(trans('error'), ['error' => $e->getMessage()]), 400);
        }
    }
}
