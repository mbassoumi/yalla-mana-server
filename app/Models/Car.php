<?php
/**
 * Created by PhpStorm.
 * User: majd2
 * Date: 2017-12-23
 * Time: 6:30 PM
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

class Car extends Model implements HasMedia, HasMediaConversions
{
    use SoftDeletes, AuditableTrait, HasMediaTrait;

    protected $casts = [
        'attributes' => 'json'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trips()
    {
        return $this->hasMany(Trip::class);
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(150)
            ->height(150)
            ->sharpen(10);
    }







}