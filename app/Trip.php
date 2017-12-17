<?php

namespace App;


use Illuminate\Database\Eloquent\SoftDeletes;

class Trip extends Model
{

    use SoftDeletes;

    protected $casts = [
        'start_point' => 'json',
        'end_point' => 'json'
    ];

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->belongsToMany('App\\User');
    }


}
