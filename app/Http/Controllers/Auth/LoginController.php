<?php

namespace App\Http\Controllers\Auth;

use App\Facades\Users;
use App\Models\Car;
use App\Http\Controllers\Controller;
use App\Notifications\RegisterDriver;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Notification;
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
     * @param Request $request
     * @return array|\Illuminate\Http\JsonResponse
     */
    public function apiSignUp(Request $request)
    {
        $request_attributes = \request()->all();

        $this->validate(request(),[
            'phone' => 'required',//|min:10|max:10',
            'name' => 'required',
            'gender' => 'required',
            'type' => 'required',
        ]);
        $user = new User();
        $user->name = $request_attributes['name'];
        $user->phone = $request_attributes['phone'];
        $user->type = $request_attributes['type'];
        $user->gender = $request_attributes['gender'];
        if (isset($request_attributes['email'])){
            $user->email = $request_attributes['email'];
        }

        if (strtolower($request_attributes['type']) == 'rider'){
            try {
                $user->status = 'active';
                $user->save();
                if ($request->hasFile('photo')){
                    logger('888');
                    logger(\request()->file('photo'));
                    $media = $user->addMedia($request->file('photo'))->preservingOriginal()->toMediaCollection('media');;
                }
                return $this->apiLogin($user->phone);
            } catch (\Exception $e) {
                if ($user){
                    $user->forceDelete();
                }
                return response()->json(apiResponseMessage(trans('failed to register user'), ['error' => $e->getMessage()]), 400);
            }
        }elseif(strtolower($request_attributes['type']) == 'driver'){
            try {
                $this->validate(request(),[
                    'driver_licence' => 'required',
                    'car' => 'required',
                    'car.seats_number' => 'required',
                    'car.model_type' => 'required',
                    'car.car_licence' => 'required',
                ]);
                $user->status = 'suspended';
                $user->save();
                if (isset($request_attributes['photo'])){
                    $media = $user->addMedia($request_attributes['photo'])->preservingOriginal()->toMediaCollection();
                    $user->photo = $media->getUrl('thumb');
                    $user->save();
                }
                $car = new Car();
                $car->user_id = $user->id;
                $car->car_licence = $request_attributes['car']['car_licence'];
                $car->seats_number = $request_attributes['car']['seats_number'];
                $car->model_type = $request_attributes['car']['model_type'];
                $car->photo = isset($request_attributes['car']['photo']) ? $request_attributes['car']['photo'] : null;
                if (isset($request_attributes['car']['model_year'])){
                    $car->model_year = $request_attributes['car']['model_year'];
                }
                $car->save();
                /*if (isset($request_attributes['car']['photo'])){
                    $media = $car->addMedia($request_attributes['car']['photo'])->preservingOriginal()->toMediaCollection();
                    $car->photo = $media->getUrl('thumb');
                    $car->save();
                }*/

//                $admin_user = User::find(1);
//                \Notification::send($admin_user, new RegisterDriver($user->id));
                $admim = User::find(1);
                if($admim){
                    $notif = Users::sendEmailNotification($admim, $user->id);
                    logger($notif);
                }

                return $this->apiLogin($user->phone);
            } catch (\Exception $e) {

                logger( $e->getMessage());

                if (isset($car) and $car){
                    logger($car);
                    try{
                        $car->forceDelete();
                    }catch (\Exception $e){
                        logger($e->getMessage());
                    }
                }

                if ($user){
                    logger($user);
                    try{
                        $user->forceDelete();
                    }catch (\Exception $e){
                        logger($e->getMessage());
                    }
                }

                return response()->json(apiResponseMessage(trans('failed to register user'), ['error' => $e->getMessage()]), 400);
            }
        }
        return $request_attributes;
    }


    /**
     * @param string $phone
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiLogin($phone = 'url')
    {
        if ($phone == 'url'){
            $this->validate(\request(), [
                'phone' => 'required'
            ]);
            $phone = \request()->get('phone');
        }
        if(!$phone){
            return response()->json(apiResponseMessage(trans('wrong request parameter'), ['error' => 'you send phone number as [ '. implode(" , ", \request()->keys()) .' ]' ]), 400);
        }
        $new_user = false;
        $user = User::where('phone',$phone)->first();
        if(!$user) {
            $new_user = true;
            return response()->json(apiResponseMessage(trans('unregistered user'), ['new_user' => $new_user]), 200);
        }
        if($user->status == 'suspended'){
            return response()->json(apiResponseMessage(trans('cant login to system'), ['user' => $user, 'error' => 'suspended user']), 403);
        }
        \DB::table('oauth_access_tokens')->where('user_id','=', $user->id)->update(['revoked' => 1]);
        $auth_user = \Auth::loginUsingId($user->id);
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
