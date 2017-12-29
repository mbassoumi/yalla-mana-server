<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use Spatie\MediaLibrary\Media;

class User extends Authenticatable implements HasMedia, HasMediaConversions
{
    use HasApiTokens, Notifiable, SoftDeletes, HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'name', 'phone', 'photo', 'type',' status',
//    ];

    protected $guarded =['status', 'deleted_at'];


    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function trips()
    {
        return $this->belongsToMany(Trip::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function car(){
        return $this->hasOne(Car::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(150)
            ->height(150)
            ->sharpen(10);
    }

}
