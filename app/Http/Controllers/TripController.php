<?php

namespace App\Http\Controllers;

use App\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function index()
    {
        $trips = Trip::all();
        return response()->json(apiResponseMessage(trans('trips list'), ['trips' => $trips]), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->all();


        //TODO: validate saving new trip
        $this->validate(request(), [
            'name' => 'required',
        ]);
        try {
            if (isset($attributes['status']) and $attributes['status'] == 'offered'){
                $user = user();
                if ($user->type == 'driver' and $user->status != 'suspended'){
                    $attributes['driver_id'] = $user->id;
                    $car = $user->car;
                    if (! $car){
                        throw new \Exception('dont have a car');
                    }
                    $attributes['car_id'] = $car->id;

                }else{
                    throw new \Exception('can\'t offer a trip');
                }
            }
            $trip = Trip::create($attributes);
            return response()->json(apiResponseMessage(trans('trip created successfully'), ['trip' => $trip]), 200);
        } catch (\Exception $e) {
            return response()->json(apiResponseMessage(trans('failed to create trip'), ['error' => $e->getMessage()]), 400);
        }
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trip $trip
     * @return \Illuminate\Http\Response
     */
    public function show($trip_id)
    {
        //
        $trip =  Trip::find($trip_id);
        if (!$trip){
            return response()->json(apiResponseMessage(trans('failed to retrieve a trip'), ['error' => 'not valid trip id']), 400);
        }else{
            return response()->json(apiResponseMessage(trans('trip retrieved successfully'), ['trip' => $trip]), 200);

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trip $trip
     * @return \Illuminate\Http\Response
     */
    public function edit(Trip $trip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Trip $trip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $trip_id)
    {
        //

        $trip =  Trip::find($trip_id);
        if (!$trip){
            return response()->json(apiResponseMessage(trans('failed to update trip'), ['error' => 'not valid trip id']), 400);
        }
        $attributes = $request->all();


        //TODO: validate  updating trip
        $this->validate(request(), [
//            'name' => 'required',
        ]);
        try {
            /*if (isset($attributes['start_point'])) {
                $attributes['start_point'] = json_encode($attributes['start_point']);
            }
            if (isset($attributes['end_point'])) {
                $attributes['end_point'] = json_encode($attributes['end_point']);
            }*/
            $trip = $trip->update($attributes);
            return response()->json(apiResponseMessage(trans('trip updated successfully'), []), 200);
        } catch (\Exception $e) {
            return response()->json(apiResponseMessage(trans('failed to update trip'), ['error' => $e->getMessage()]), 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trip $trip
     * @return \Illuminate\Http\Response
     */
    public function destroy($trip_id)
    {
        $trip =  Trip::find($trip_id);
        if (!$trip){
            return response()->json(apiResponseMessage(trans('failed to delete a trip'), ['error' => 'not valid trip id']), 400);
        }else{
            $trip->delete();
            return response()->json(apiResponseMessage(trans('trip deleted successfully'), []), 200);

        }
        //
    }

    public function reserveTrip($trip_id)
    {
        try {

            $trip = Trip::find($trip_id);
            if (!$trip) {
                return response()->json(apiResponseMessage(trans('failed to reserve a trip'), ['error' => 'not valid trip id']), 400);
            } else {
                logger($trip->car->seats_number);
                logger($trip->riders()->count());
                if ($trip->riders()->count() < $trip->car->seats_number){
                    $trip->riders()->attach(user()->id);
                    return response()->json(apiResponseMessage(trans('trip reserved successfully'), []), 200);
                }
                else{
                    throw new \Exception('the trip is full');
                }
            }
        }catch (\Exception $e){
            return response()->json(apiResponseMessage(trans('failed to reserve a trip'), ['error' => $e->getMessage()]), 400);
        }
    }
}
