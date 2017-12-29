<?php
/**
 * Created by PhpStorm.
 * User: majd2
 * Date: 2017-12-17
 * Time: 8:11 PM
 */

namespace App;


use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use Spatie\MediaLibrary\Media;
use Yajra\Auditable\AuditableTrait;

class Comment extends Model implements HasMedia, HasMediaConversions
{
    use SoftDeletes, AuditableTrait, HasMediaTrait;

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(150)
            ->height(150)
            ->sharpen(10);
    }


}