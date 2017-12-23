<?php

namespace App;


use Illuminate\Database\Eloquent\SoftDeletes;
use Yajra\Auditable\AuditableTrait;

class Trip extends Model
{

    use SoftDeletes, AuditableTrait;

    protected $casts = [
        'start_point' => 'json',
        'end_point' => 'json',
        'attributes' => 'json'
    ];

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function riders()
    {
        return $this->belongsToMany(User::class);
    }

    public function car()
    {
        return $this->hasOne(Car::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function driver()
    {
        return $this->hasOne(User::class, 'driver_id');
    }



}