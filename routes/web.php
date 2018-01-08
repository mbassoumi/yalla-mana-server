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

Route::group(['prefix' => 'user/{user}'], function () {

    Route::get('accept-driver', 'UserController@acceptDriver');
    Route::get('decline-driver', 'UserController@declineDriver');
});
/*
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/

Route::get('majd', function (){
   $user = \App\User::find(1);
   \Illuminate\Support\Facades\Notification::send($user, new \App\Notifications\RegisterDriver($user->id));
//   $user->notify(new \App\Notifications\RegisterDriver());
});