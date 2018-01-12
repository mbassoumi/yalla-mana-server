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

Route::get('user/{user}/details','UserController@userDetails');
/*
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/

Route::get('majd/{var}', function ($var){
    $user = \App\User::find($var);
//    dd(public_path());
    $media = $user->getFirstMedia('media');
//    dd($media->getUrl());
//    dd(public_path());
//    foreach ($medias as $media){
//        logger($media);
        return view('test', compact( 'media'));
//    }
//    foreach ($medias as $media){
//
//        <img src="{{$media->getUrl()}}" height="222" width="222">
//
//    }
//    return $media;

//    $path = base_path();
//return $path;
//    $user = \App\User::find(1);
//   \Illuminate\Support\Facades\Notification::send($user, new \App\Notifications\RegisterDriver($user->id));
//   $user->notify(new \App\Notifications\RegisterDriver());
});