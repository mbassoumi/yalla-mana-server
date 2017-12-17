<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


use Validator;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('guest')->except('logout');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiLogin()
    {
        $phone = \request()->get('phone');
        $user = User::where('phone',request('phone'))->first();
        $new_user = false;
        if(!$user) {
            $user = new User;
            $user->phone = $phone;
            $user->save();
            $new_user = true;
        }
        $auth_user = Auth::loginUsingId($user->id);
        $token = $auth_user->createToken(config('app.name'))->accessToken;
        return response()->json(apiResponseMessage(trans('Login Successfully'), ['user' => $auth_user, 'new_user' => $new_user, 'token' => $token]), 200);

    }

   /* public function apiGetCode()
    {
        $phone = \request()->get('phone');
        $digits = 6;
        $code = (string)rand(pow(10, $digits-1), pow(10, $digits)-1);
        $user = User::where('phone' , $phone)->first();
        $new_user = false;
        if($user){
            $user->password = $code;
            $user->save();
        }else{
            $user = new User;
            $user->phone = $phone;
            $user->password = $code;
            $user->save();
            $new_user = true;
        }
        return response()->json(apiResponseMessage(trans('Your login Code'), ['code' => $code, 'new_user' => $new_user]), 200);
    }*/

}
