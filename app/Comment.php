<?php
/**
 * Created by PhpStorm.
 * User: majd2
 * Date: 2017-12-17
 * Time: 8:11 PM
 */

namespace App;


use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}