<?php
/**
 * Created by PhpStorm.
 * User: Majd
 * Date: 1/10/2018
 * Time: 4:21 PM
 */

namespace App\Transformers\SocialMedia;


use App\Models\Comment;
use League\Fractal\TransformerAbstract;

class CommentTransformer extends TransformerAbstract
{
    public function transform(Comment $comment)
    {
        return [
            'id' => $comment->id,
            'post_id' => $comment->post_id,
            'body' => $comment->body,
            'created_by' => $comment->creator,
            'updated_by' => $comment->updater,
            'created_at' => format_date_time($comment->created_at),
            'updated_at' => format_date_time($comment->updated_at),
        ];
    }
}