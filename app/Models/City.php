<?php

namespace App\Models;


use App\Model;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yajra\Auditable\AuditableTrait;

class City extends Model
{

    protected $casts = [
        'name' => 'json',
        'attributes' => 'json'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    //
    use AuditableTrait;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fromTrip()
    {
        return $this->hasMany(Trip::class, 'from_city_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function toTrip()
    {
        return $this->hasMany(Trip::class, 'to_city_id','id');
    }



}
