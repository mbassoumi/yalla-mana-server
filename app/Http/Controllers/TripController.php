<?php

namespace App\Http\Controllers;

use App\Http\Requests\TripRequest;
use App\Models\Trip;
use App\Models\Trip\Transformers\TripTransformer;
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
    public function index()
    {
        $trips = Trip::all();
        $trips = fractal($trips, new TripTransformer())->toArray();
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
     * @param TripRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TripRequest $request)
    {
        $attributes = $request->all();

        try {
            if ($attributes['status'] == 'offered'){

                $this->validate(\request(), [
                    'seats_number' => 'required'
                ]);

                $user = user();
                $attributes['driver_id'] = $user->id;
                $car = $user->car;
                if (!$car){
                    throw new \Exception('dont have a car');
                }
                $attributes['car_id'] = $car->id;
            }elseif ($attributes['status'] == 'requested'){
                $attributes['seats_number'] = null;
                $attributes['car_id'] = null;
                $attributes['attributes'] = null;
                $attributes['driver_id'] = null;
            }else{
                throw new \Exception('unknown trip status');
            }
            $trip = Trip::create([
                'from_city_id' => $attributes['from_city_id'],
                'to_city_id' => $attributes['to_city_id'],
                'date' => $attributes['date'],
                'price' => $attributes['price'],
                'status' => $attributes['status'],
                'seats_number' => isset($attributes['seats_number']) ? $attributes['seats_number'] : null ,
                'driver_id' => isset($attributes['driver_id']) ? $attributes['driver_id'] : null ,
                'attributes' => isset($attributes['attributes']) ? $attributes['attributes'] : null ,
                'car_id' => isset($attributes['car_id']) ? $attributes['car_id'] : null ,
            ]);
            return response()->json(apiResponseMessage(trans('trip created successfully'), ['trip' => $trip]), 200);
        } catch (\Exception $e) {
            return response()->json(apiResponseMessage(trans('failed to create trip'), ['error' => $e->getMessage()]), 400);
        }
        //
    }

    /**
     * @param $trip_id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($trip_id)
    {
        //
        try{
            $trip =  Trip::find($trip_id);
            if (!($trip)){
                return response()->json(apiResponseMessage(trans('failed to retrieve a trip'), ['error' => 'not valid trip id']), 400);
            }else{
                $trip = fractal($trip, new TripTransformer())->toArray();
                return response()->json(apiResponseMessage(trans('trip retrieved successfully'), ['trip' => $trip]), 200);
            }
        }catch (\Exception $e){
            return response()->json(apiResponseMessage(trans('failed to retrieve a trip'), ['error' => $e->getMessage()]), $e->getCode());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trip $trip
     * @return \Illuminate\Http\Response
     */
    public function edit(Trip $trip)
    {
        //
    }

    /**
     * @param Request $request
     * @param $trip_id
     * @return \Illuminate\Http\JsonResponse
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
     * @param $trip_id
     * @return \Illuminate\Http\JsonResponse
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

    /**
     * @param $trip_id
     * @return \Illuminate\Http\JsonResponse
     */
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
