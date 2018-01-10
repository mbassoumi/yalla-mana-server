<?php
/**
 * Created by PhpStorm.
 * User: Majd
 * Date: 1/10/2018
 * Time: 4:10 PM
 */

namespace App\Transformers\SocialMedia;


use App\Models\Post;
use League\Fractal\TransformerAbstract;

class PostTransformer extends TransformerAbstract
{
    public function transform(Post $post)
    {
        $comments = $post->comments;
        $comments = fractal($comments, new CommentTransformer())->toArray();

        return [
            'id' => $post->id,
            'body' => $post->body,
            'created_by' => $post->creator,
            'updated_by' => $post->updater,
            'created_at' => format_date_time($post->created_at),
            'updated_at' => format_date_time($post->updated_at),
            'comments' => $comments['data'],
        ];
    }
}