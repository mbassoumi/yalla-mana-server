<?php

namespace App\Http\Controllers;

use App\Http\Requests\TripRequest;
use App\Models\Trip;
use App\Models\Trip\Transformers\TripTransformer;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TripController extends Controller
{

    /**
     * TripController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TripRequest $request)
    {
        $trips = Trip::all();
        $user = \user();
        $user_trip = $user->trips->pluck('id','id');
        $valid_trips = $trips->where('driver_id', '<>', null)
            ->where('date', '>=', Carbon::now())
            ->whereNotIn('id', $user_trip);
//        $unaccepted_trips = $trips->where('driver_id', '==', null);
//        $trips = fractal($trips, new TripTransformer())->toArray();
        $valid_trips = fractal($valid_trips, new TripTransformer())->toArray();
//        $unaccepted_trips = fractal($unaccepted_trips, new TripTransformer())->toArray();
        return response()->json(apiResponseMessage(trans('trips list'), ['trips' => $valid_trips['data']]), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
    }

    /**
     * @param TripRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TripRequest $request)
    {
        $attributes = $request->all();

        try {
            if ($attributes['status'] == 'offered') {

                /* $this->validate(\request(), [
                     'seats_number' => 'required'
                 ]);*/

                $user = user();
                $attributes['driver_id'] = $user->id;
                $car = $user->car;
                if (!$car) {
                    throw new \Exception('dont have a car');
                }
                $attributes['car_id'] = $car->id;
            } elseif ($attributes['status'] == 'requested') {
                $attributes['car_id'] = null;
                $attributes['driver_id'] = null;
            } else {
                throw new \Exception('unknown trip status');
            }
            $trip = Trip::create([
                'from_city_id' => $attributes['from_city_id'],
                'to_city_id' => $attributes['to_city_id'],
                'date' => $attributes['date'],
                'price' => $attributes['price'],
                'status' => $attributes['status'],
                'seats_number' => isset($attributes['seats_number']) ? $attributes['seats_number'] : null,
                'driver_id' => isset($attributes['driver_id']) ? $attributes['driver_id'] : null,
                'attributes' => isset($attributes['attributes']) ? $attributes['attributes'] : null,
                'car_id' => isset($attributes['car_id']) ? $attributes['car_id'] : null,
            ]);

            if ($trip->status == 'requested') {
                $trip->riders()->attach(user()->id);
            }
            $trip = fractal($trip, new TripTransformer())->toArray();
            return response()->json(apiResponseMessage(trans('trip created successfully'), ['trip' => $trip['data']]), 200);
        } catch (\Exception $e) {
            return response()->json(apiResponseMessage(trans('failed to create trip'), ['error' => $e->getMessage()]), 400);
        }
        //
    }

    /**
     * @param TripRequest $request
     * @param $trip_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(TripRequest $request, $trip_id)
    {
        //
        try {
            $trip = Trip::find($trip_id);
            if (!($trip)) {
                return response()->json(apiResponseMessage(trans('failed to retrieve a trip'), ['error' => 'not valid trip id']), 400);
            } else {
                $trip = fractal($trip, new TripTransformer())->toArray();
                return response()->json(apiResponseMessage(trans('trip retrieved successfully'), ['trip' => $trip['data']]), 200);
            }
        } catch (\Exception $e) {
            return response()->json(apiResponseMessage(trans('failed to retrieve a trip'), ['error' => $e->getMessage()]), $e->getCode());
        }
    }

    /**
     * @param TripRequest $request
     * @param Trip $trip
     */
    public function edit(TripRequest $request, Trip $trip)
    {
        //
    }

    /**
     * @param TripRequest $request
     * @param $trip_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TripRequest $request, $trip_id)
    {
        //

        $trip = Trip::find($trip_id);
        if (!$trip) {
            return response()->json(apiResponseMessage(trans('failed to update trip'), ['error' => 'not valid trip id']), 400);
        }
        $attributes = $request->all();
        $updated_fields = [];
        if (isset($attributes['from_city_id'])) {
            $updated_fields['from_city_id'] = $attributes['from_city_id'];
        }
        if (isset($attributes['to_city_id'])) {
            $updated_fields['to_city_id'] = $attributes['to_city_id'];
        }
        if (isset($attributes['price'])) {
            $updated_fields['price'] = $attributes['price'];
        }
        if (isset($attributes['seats_number'])) {
            $updated_fields['seats_number'] = $attributes['seats_number'];
        }
        if (isset($attributes['date'])) {
            $updated_fields['date'] = $attributes['date'];
        }


        try {

            $trip->update($updated_fields);
            $trip = fractal($trip, new TripTransformer())->toArray();
            return response()->json(apiResponseMessage(trans('trip updated successfully'), ['trip' => $trip['data']]), 200);
        } catch (\Exception $e) {
            return response()->json(apiResponseMessage(trans('failed to update trip'), ['error' => $e->getMessage()]), 400);
        }
    }

    /**
     * @param TripRequest $request
     * @param $trip_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(TripRequest $request, $trip_id)
    {
        $trip = Trip::find($trip_id);
        if (!$trip) {
            return response()->json(apiResponseMessage(trans('failed to delete a trip'), ['error' => 'not valid trip id']), 400);
        } else {
            $trip->delete();
            return response()->json(apiResponseMessage(trans('trip deleted successfully'), []), 200);

        }
        //
    }

    /**
     * @param TripRequest $request
     * @param $trip_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function reserveTrip(TripRequest $request, $trip_id)
    {
        try {

            $trip = Trip::find($trip_id);
            if (!$trip) {
                return response()->json(apiResponseMessage(trans('failed to reserve a trip'), ['error' => 'not valid trip id']), 400);
            } else {
                $trip->riders()->attach(user()->id);
                return response()->json(apiResponseMessage(trans('trip reserved successfully'), []), 200);
            }
        } catch (\Exception $e) {
            return response()->json(apiResponseMessage(trans('failed to reserve a trip'), ['error' => $e->getMessage()]), 400);
        }
    }

    /**
     * @param TripRequest $request
     * @param $trip_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function cancelReservation(TripRequest $request, $trip_id)
    {
        try {

            $trip = Trip::find($trip_id);
            if (!$trip) {
                return response()->json(apiResponseMessage(trans('failed to cancel reservation'), ['error' => 'not valid trip id']), 400);
            } else {
                $trip->riders()->detach(user()->id);
                return response()->json(apiResponseMessage(trans('trip canceled successfully'), []), 200);
            }
        } catch (\Exception $e) {
            return response()->json(apiResponseMessage(trans('failed to cancel reservation'), ['error' => $e->getMessage()]), 400);
        }
    }


    /**
     * @param TripRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function myTrips(TripRequest $request)
    {
        try {
            $requested_trips = Trip::where('driver_id', '=', null)->where('date', '>=', Carbon::now())->get();
            $trips = \user()->trips;
            $driving_trips = \user()->drivingTrips;
            $trips = $trips->merge($driving_trips);
            $past_trips = $trips->where('date', '<', Carbon::now());
            $today_trips = $trips->where('date', '>=', Carbon::now())->where('date', '<=', Carbon::tomorrow());
            $future_trips = $trips->where('date', '>=', Carbon::tomorrow());
            $trips = fractal($trips, new TripTransformer())->toArray();
            $past_trips = fractal($past_trips, new TripTransformer())->toArray();
            $today_trips = fractal($today_trips, new TripTransformer())->toArray();
            $future_trips = fractal($future_trips, new TripTransformer())->toArray();

            $requested_trips = fractal($requested_trips, new TripTransformer())->toArray();

            return response()->json(apiResponseMessage(trans('my trips'), ['past_trips' => $past_trips['data'], 'today_trips' => $today_trips['data'], 'future_trips' => $future_trips['data'], 'requested_trips' => $requested_trips['data']]), 200);
        } catch (\Exception $e) {
            return response()->json(apiResponseMessage(trans('failed to retrieve my trips'), ['error' => $e->getMessage()]), 400);
        }
    }

    /**
     * @param TripRequest $tripRequest
     * @param $trip_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function acceptTrip(TripRequest $tripRequest, $trip_id)
    {
        try {
            $trip = Trip::find($trip_id);
            $trip->driver_id = \user()->id;
            $trip->car_id = \user()->car->id;
            $trip->save();
            return response()->json(apiResponseMessage(trans('Trip accepted'), []), 200);
        } catch (\Exception $e) {
            return response()->json(apiResponseMessage(trans('failed to accept the trip'), ['error' => $e->getMessage()]), 400);
        }
    }

}
