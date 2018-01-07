<?php
/**
 * Created by PhpStorm.
 * User: Majd
 * Date: 12/30/2017
 * Time: 10:03 PM
 */

namespace App\Models\Trip\Transformers;


use App\Facades\Trips;
use App\Models\Trip;
use App\User;
use Carbon\Carbon;
use League\Fractal\TransformerAbstract;

class TripTransformer extends TransformerAbstract
{
    public function transform(Trip $trip)
    {
        return [
            'id' => $trip->id,
            'from_city' => $trip->fromTripCity,
            'to_city' => $trip->toTripCity,
            'seats_number' => $trip->seats_number,
            'date' => format_date_time($trip->date),
            'price' => $trip->price,
            'driver' => $trip->driver,
            'car' => $trip->car,
            'status' => $trip->status,
            'riders' => Trips::getTripRiders($trip),
            'attributes' => $trip->attributes,
            'created_by' => $trip->creator,
            'updated_by' => $trip->updater,
            'created_at' => format_date_time($trip->created_at),
            'updated_at' => format_date_time($trip->updated_at),
            'can_cancel' => Trips::canCancelReservation($trip),
            'can_delete' => Trips::canDeleteTrip($trip),
            'can_reserve' => Trips::canReserve($trip),
            'has_user' => $trip->hasUser(\user()),
        ];
    }
}