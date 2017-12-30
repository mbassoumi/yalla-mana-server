<?php

namespace App;


use Illuminate\Database\Eloquent\SoftDeletes;
use Yajra\Auditable\AuditableTrait;

class City extends Model
{
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
