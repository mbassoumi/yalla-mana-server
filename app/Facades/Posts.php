<?php
/**
 * Created by PhpStorm.
 * User: Majd
 * Date: 1/10/2018
 * Time: 4:16 PM
 */

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class Posts extends Facade
{

    /**
     * @return \App\Classes\Posts|string
     */
    protected static function getFacadeAccessor()
    {
        return new \App\Classes\Posts();
    }
}