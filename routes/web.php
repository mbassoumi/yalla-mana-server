<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/*
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/


//Route::get('majd', function (){
//    $user = \Auth::loginUsingId(1);
////    $token = $user->createToken(config('app.name'))->accessToken;
////
////    logger($token);
////    dd($user->tokens);
////    dd($user->tokens->where('revoked', '=', 0));
//    dd(user()->accessToken);
//    \Davibennun\LaravelPushNotification\Facades\PushNotification::app('yallaManaAndroid')
//        ->to('eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjFkMjc0YzkyYzM0MWQ5ODI3ZDk0Y2Q0MDMyYTU1OGViNzEyOTM2YjM4NjNkZjkyNGZmNGI5MzEyMjNmZWRkMjNkYzQwMjcxNDU4ZWJhNTQwIn0.eyJhdWQiOiIxIiwianRpIjoiMWQyNzRjOTJjMzQxZDk4MjdkOTRjZDQwMzJhNTU4ZWI3MTI5MzZiMzg2M2RmOTI0ZmY0YjkzMTIyM2ZlZGQyM2RjNDAyNzE0NThlYmE1NDAiLCJpYXQiOjE1MTU0MzEyNTYsIm5iZiI6MTUxNTQzMTI1NiwiZXhwIjoxNTQ2OTY3MjU2LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.Y13IibnfLYJcHPHo5HeQ6GVmw6kKe1uXz_e9SYEcNyJ3ZhEwuXttuBvRAhA3eWfSlXSNtrTsMZ75vdIGQV-AvtUVCkP8eCXhWBy5zUstU6XgxTxYxtK369OnzjS9Mc8dUy-1aN6WSQmUdNXgcvM3z5stywOmIwzUmDS0jclmSWdMFEj7dPE3xiotQ5fjtTZ9kMBYJ5VnoUcwj-DkTJvZkGs2spSNtx8pBQMlx_QEHNdG1M2prVMbxax44q4u_UFf4eyercNiGtpxRk7BGSyHHz-cccnhe0jh57dRdIiLbhd0y4LPj06NmKOteFGvhGefb1oChOBF8_InoFBUxhYuZ6AXB6BSkCg6CLBR8hsSo8_xlHT3j8aA7czdLh0fl8trzhjiLMI22bFfc2vDzHY15Os8DshPBT66_ogsyDA38h9fBYdtrx-G9XuhzmflC6X5Otya9tLkGDeKi5oyEK3lq6A6nnS2SEN91I09OJQ4699okL_5LMuVFjopxsf6-2Z-GYK-_ZZU09Llec66oEvoYH8IN4QJTipb0NhKUTqvlb2nQIbXCvwEvotAT4C7prdZNCkddiPXH1vTiOwz0WAAr3BVCBZFVyt2Auy4nDE3Drc1oA-AA7LX2bLoZxiXwvjKlh5yOWtQ0UvHJ68Ga1CZt86nkcRGxO1zQa0l1hAY5HA')
//        ->send('Hello World, i`m a push message');
////    dd($token);
////    \Auth::loginUsingId(2);
//
//});