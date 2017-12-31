<?php

namespace App\Models;


use App\Model;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yajra\Auditable\AuditableTrait;

class Trip extends Model
{

    use SoftDeletes, AuditableTrait;

    protected $casts = [
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function driver()
    {
        return $this->hasOne(User::class, 'id','driver_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function fromTripCity()
    {
        return $this->hasOne(City::class, 'id','from_city_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function toTripCity()
    {
        return $this->hasOne(City::class, 'id','to_city_id');
    }




}
