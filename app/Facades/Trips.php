<?php
/**
 * Created by PhpStorm.
 * User: Majd
 * Date: 12/31/2017
 * Time: 4:29 PM
 */

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class Trips extends Facade
{

    protected static function getFacadeAccessor()
    {
        return new \App\Classes\Trips();
    }
}