<?php
/**
 * Created by PhpStorm.
 * User: majd2
 * Date: 2017-12-23
 * Time: 6:30 PM
 */

namespace App;


use Illuminate\Database\Eloquent\SoftDeletes;
use Yajra\Auditable\AuditableTrait;

class Car extends Model
{
    use SoftDeletes, AuditableTrait;

    protected $casts = [
        'start_point' => 'json',
        'end_point' => 'json',
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function trips()
    {
        return $this->belongsToMany(Trip::class);
    }







}