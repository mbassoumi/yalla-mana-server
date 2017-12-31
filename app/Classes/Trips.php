<?php
/**
 * Created by PhpStorm.
 * User: Majd
 * Date: 12/31/2017
 * Time: 4:28 PM
 */

namespace App\Classes;


use App\Models\Trip;
use Carbon\Carbon;

class Trips
{
    /**
     * Trips constructor.
     */
    public function __construct()
    {
    }


    /**
     * @param Trip $trip
     * @return bool
     */
    public function canDeleteTrip(Trip $trip)
    {
        $days_to_start = ($trip->date)->diffInDays(Carbon::now());
        logger($trip->date);
        logger(Carbon::now());
        logger($days_to_start);
        if($days_to_start >= 1){
            return true;
        }else{
            return false;
        }
    }

    /**
     * @param Trip $trip
     * @return array|null
     */
    public function getTripRiders(Trip $trip)
    {
        $trip_riders_count = $trip->riders()->count();
        if ($trip_riders_count >= 1){
            return [
              'count' => $trip_riders_count,
              'users' => $trip->riders,
            ];
        }else{
            return null;
        }
    }

    /**
     * @param Trip $trip
     * @return bool
     */
    public function canReserve(Trip $trip)
    {
        if ($trip->seats_number > $trip->riders()->count()){
            return true;
        }else{
            return false;
        }
    }




}