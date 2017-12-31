<?php
/**
 * Created by PhpStorm.
 * User: majd2
 * Date: 2017-12-17
 * Time: 8:11 PM
 */

namespace App\Models;


use App\Model;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use Spatie\MediaLibrary\Media;
use Yajra\Auditable\AuditableTrait;

class Post extends Model implements HasMedia, HasMediaConversions
{

    protected $casts = [
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    use SoftDeletes, AuditableTrait, HasMediaTrait;


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

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(150)
            ->height(150)
            ->sharpen(10);
    }

}