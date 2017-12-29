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
    $user = \App\User::find(46);
    return $user->getFirstMedia($user->getMedia());
    $user->registerMediaConversions($user->getFirstMedia());

    return $user->getMedia()->first()->getUrl('thumb');

    return $user->getMedia();
});