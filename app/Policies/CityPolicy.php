<?php

namespace App\Policies;

use App\User;
use App\Models\City;
use Illuminate\Auth\Access\HandlesAuthorization;

class CityPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the city.
     *
     * @param  \App\User  $user
     * @param  \App\Models\City  $city
     * @return mixed
     */
    public function view(User $user, City $city)
    {
        //
    }

    /**
     * Determine whether the user can create cities.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the city.
     *
     * @param  \App\User  $user
     * @param  \App\Models\City  $city
     * @return mixed
     */
    public function update(User $user, City $city)
    {
        //
    }

    /**
     * Determine whether the user can delete the city.
     *
     * @param  \App\User  $user
     * @param  \App\Models\City  $city
     * @return mixed
     */
    public function delete(User $user, City $city)
    {
        //
    }
}
