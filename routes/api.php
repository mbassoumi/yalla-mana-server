<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('auth/login', 'Auth\LoginController@apiLogin');

Route::post('get-code', 'Auth\LoginController@apiGetCode');

\Route::group(['middleware' => 'auth:api','prefix' => 'auth'], function () {
    Route::get('user', function (Request $request) {
        return $request->user('api');
    });
});


//#####################################   trip routes   ##############################################
/*
 * trip routes
 */
\Route::post('trip/{trip_id}/reserve','TripController@reserveTrip');
\Route::resource('trip','TripController');




//#####################################   user routes   ##############################################


/*
 * user routes
 */
\Route::resource('user','UserController');


//#####################################   car routes   ##############################################

/*
 * cars routes
 */
\Route::resource('car','CarController');


//#####################################   social media routes   #####################################

/*
 * Posts routes
 */
\Route::get('post/{post_id}/comments','PostController@getPostComments');
\Route::get('post/my_post','PostController@getMyPost');
\Route::resource('post','PostController');


/*
 * comments controller
 */
\Route::resource('comment','CommentController');
\Route::get('comment/{comment_id}/post','CommentController@getCommentPost');

//#####################################   trip routs   ##############################################




