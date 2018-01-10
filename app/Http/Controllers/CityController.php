<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Transformers\map\MapCitiesTransformer;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return response()->json(apiResponseMessage(trans('cities list'), ['cities' => $cities]), 200);

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show($city_id)
    {
        $city =  City::find($city_id);
        if (!$city){
            return response()->json(apiResponseMessage(trans('failed to retrieve a city'), ['error' => 'not valid city id']), 404);
        }else{
            return response()->json(apiResponseMessage(trans('city retrieved successfully'), ['city' => $city]), 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        //
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function citiesOnMap()
    {
        try{
            $cities = City::all();
            $cities = fractal($cities, new MapCitiesTransformer())->toArray();
            return response()->json(apiResponseMessage(trans('map cities'), ['cities' => $cities['data']]), 200);
        }catch (\Exception $e){
            return response()->json(apiResponseMessage(trans('failed to retrieve cities'), ['error' => $e->getMessage()]), 400);
        }

    }
}
