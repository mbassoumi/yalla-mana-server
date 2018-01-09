<?php
/**
 * Created by PhpStorm.
 * User: Majd
 * Date: 12/31/2017
 * Time: 4:28 PM
 */

namespace App\Classes;


use App\Models\Trip;
use App\Notifications\RegisterDriver;

class Users
{
    /**
     * Users constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param $admin
     * @param $driver_id
     * @return bool|string
     */
    public function sendEmailNotification($admin , $driver_id){
        try{
            \Notification::send($admin, new RegisterDriver($driver_id));
            return true;
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }




}