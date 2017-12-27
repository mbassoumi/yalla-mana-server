<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * CarController constructor.
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
        $cars = Car::all();
        return response()->json(apiResponseMessage(trans('cars list'), ['cars' => $cars]), 200);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->all();

        $this->validate(request(),[
         //   'body' => 'required',
        ]);

        try {
            $car = Car::create($attributes);
            return response()->json(apiResponseMessage(trans('car created successfully'), ['car' => $car]), 200);
        } catch (\Exception $e) {
            return response()->json(apiResponseMessage(trans('failed to create a car'), ['error' => $e]), 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show($car_id)
    {
        $car =  Car::find($car_id);
        if (!$car){
            return response()->json(apiResponseMessage(trans('failed to retrieve a car'), ['error' => 'not valid car id']), 400);
        }else{
            return response()->json(apiResponseMessage(trans('car retrieved successfully'), ['car' => $car]), 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $car_id)
    {
        $car =  Car::find($car_id);
        if (!$car){
            return response()->json(apiResponseMessage(trans('failed to update car information'), ['error' => 'not valid car id']), 400);
        }
        $attributes = $request->all();

        try {
            $car = $car->update($attributes);
            return response()->json(apiResponseMessage(trans('car updated successfully'), []), 200);
        } catch (\Exception $e) {
            return response()->json(apiResponseMessage(trans('failed to update car'), ['error' => $e]), 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy($car_id)
    {
        $car =  Car::find($car_id);
        if (!$car){
            return response()->json(apiResponseMessage(trans('failed to delete a car'), ['error' => 'not valid car id']), 400);
        }else{
            $car->delete();
            return response()->json(apiResponseMessage(trans('car deleted successfully'), []), 200);

        }
    }
}
