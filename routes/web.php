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


\Route::get('majd',function (){
    $user = \App\User::find(1);
    $trip = \App\Trip::find(6);
//    $trip->riders()->attach(1);
    dd($trip->riders()->count());
    dd($trip->driver);
    dd('aa');
    dd($trip->car->seats_number);

    dd($user->car);
});