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
     * @param $add_to_log
     * @param $message
     * @param $data
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