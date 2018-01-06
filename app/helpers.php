<?php
/**
 * Created by PhpStorm.
 * User: majd2
 * Date: 2017-12-14
 * Time: 7:28 PM
 */

use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Request;

if (!function_exists('apiResponseMessage')) {
    /**
     * @param string $message
     * @param array $data
     * @param bool $add_to_log
     * @param null $model
     * @param string $action
     * @return array
     */
    function apiResponseMessage($message = '', $data = [], $add_to_log = false, $model = null, $action = '')
    {
        if ($add_to_log) {
            \Log::error("==========$model $action=========");
            \Log::error($data);
            \Log::error('================================');
            $data = @$data->getMessage();
        }

        return [
            'message' => $message,
            'data' => $data
        ];
    }


}
if (!function_exists('user')) {
    /**
     * @param null $guard
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    function user($guard = null)
    {
        if (is_null($guard)) {
            if (\Session::has('guard') && !empty(\Session::get('guard'))) {
                $guard = \Session::get('guard');
            } else {
                $guard = 'web';
            }
        }

//        $guard = is_null($guard) ? 'web' : $guard;
        if (Auth::guard($guard)->check()) {
            return Auth::guard($guard)->user();
        }

        return Auth::guard('api')->user();
    }

}


if (!function_exists('format_date_time')) {
    /**
     * @param $datetime
     * @return array
     */
    function format_date_time($datetime) //, $format = 'd M, Y h:i A')
    {
//        return date($format, strtotime($datetime));
        return [
            'date' => date('Y-m-d', strtotime($datetime)),
            'time' => date('H:i:s', strtotime($datetime))
            //$datetime->format('d.m.Y'),
        ];
    }

}