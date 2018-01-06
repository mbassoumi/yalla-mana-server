<?php

namespace App\Policies;

use App\User;
use App\Models\Trip;
use Illuminate\Auth\Access\HandlesAuthorization;

class TripPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the trip.
     *
     * @param  \App\User $user
     * @param  \App\Models\Trip $trip
     * @return mixed
     */
    public function view(User $user, Trip $trip)
    {
        if ($user->status != 'suspended') {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create trips.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the trip.
     *
     * @param  \App\User $user
     * @param  \App\Models\Trip $trip
     * @return mixed
     */
    public function update(User $user, Trip $trip)
    {
        logger($trip->created_by == $user->id);
        logger($trip->riders()->count() == 0);
        if ($trip->created_by == $user->id
            and $trip->riders()->count() == 0) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the trip.
     *
     * @param  \App\User $user
     * @param  \App\Models\Trip $trip
     * @return mixed
     */
    public function delete(User $user, Trip $trip)
    {
        if (($trip->created_by == $user->id or $trip->driver_id == $user->id )and $trip->riders()->count() == 0) {
            return true;
        }
        return false;
    }


    /**
     * @param User $user
     * @return bool
     */
    public function offerTrip(User $user)
    {
        if ($user->type == 'driver' and $user->status == 'active') {
            return true;
        }
        return false;
    }

    /**
     * @param User $user
     * @return bool
     */
    public function requestTrip(User $user)
    {
        if ($user->status == 'active') {
            return true;
        }
        return false;
    }

    /**
     * @param User $user
     * @param Trip $trip
     * @return bool
     */
    public function reserveTrip(User $user, Trip $trip)
    {
        //TODO: check if user has another trip at same time.
        if ($trip->driver_id != $user->id
            and $trip->seats_number > $trip->riders()->count()
            and $trip->stillDays() >= 1
            and !$user->hasTripToRide($trip)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param User $user
     * @param Trip $trip
     * @return bool
     */
    public function cancelReservation(User $user, Trip $trip)
    {
        if ($trip->stillDays() >= 1
            and $user->hasTripToRide($trip)
            and $trip->driver_id != $user->id) {
            return true;
        }
        return false;
    }


    public function before($user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }
}
