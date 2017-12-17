<?php
/**
 * Created by PhpStorm.
 * User: majd2
 * Date: 2017-12-17
 * Time: 8:11 PM
 */

namespace App;


use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use SoftDeletes;

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addComment($body)
    {
        $this->comments()->create(compact('body'));
    }

}