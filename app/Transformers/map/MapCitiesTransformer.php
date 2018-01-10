<?php
/**
 * Created by PhpStorm.
 * User: Majd
 * Date: 1/10/2018
 * Time: 6:36 PM
 */

namespace App\Transformers\map;


use App\Models\City;
use League\Fractal\TransformerAbstract;

class MapCitiesTransformer extends TransformerAbstract
{
    public function transform(City $city)
    {
        $from_cities = $city->toTrip->groupBy('from_city_id', 'id')->toArray();
        $from_cities = array_keys($from_cities);
        return [
            'id' => $city->id,
            'name' => $city->name['en'],
            'lon' => $city->lon,
            'lat' => $city->lat,
            'from_city' => $from_cities,
        ];
    }
}