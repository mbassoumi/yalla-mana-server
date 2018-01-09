<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * UserController constructor.
     */
    public function __construct()
    {
//        $this->middleware('auth:api');
    }

    public function userDetails($user_id)
    {
        $user = User::find($user_id);
        return view('driver_details', compact('user'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response()->json(apiResponseMessage(trans('users list'), ['users' => $users]), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->all();

        //TODO: validate saving new user
        $this->validate(request(), [
            'phone' => 'required',
        ]);
        try {
            $user = User::create($attributes);
            if ($user->type == 'driver'){
                $user->status = 'suspended';
                $user->save();
            }else
            {
                $user->status = 'active';
                $user->save();
            }
            return response()->json(apiResponseMessage(trans('user registered successfully'), ['user' => $user]), 200);
        } catch (\Exception $e) {
            return response()->json(apiResponseMessage(trans('failed to register user'), ['error' => $e->getMessage()]), 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $user =  User::find($user_id);
        if (!$user){
            return response()->json(apiResponseMessage(trans('failed to retrieve user information'), ['error' => 'not valid trip id']), 400);
        }else{
            return response()->json(apiResponseMessage(trans('trip retrieved successfully'), ['user' => $user]), 200);

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        $user =  User::find($user_id);
        if (!$user){
            return response()->json(apiResponseMessage(trans('failed to update user information'), ['error' => 'not valid user id']), 400);
        }
        $attributes = $request->all();


        //TODO: validate  updating trip
        $this->validate(request(), [
//            'name' => 'required',
        ]);
        try {
            if (isset($attributes['phone'])){
                throw new \Exception(trans('cant update phone number'));
            }
            if(isset($attributes['type'])){
                if ($attributes['type'] == 'driver'){
                    if ($user->type == 'rider'){
                        $suspend_user = true;
                    }
                }
            }
            $user->update($attributes);
            if (isset($suspend_user)){
                $user->status = 'suspended';
                $user->save();
            }
            return response()->json(apiResponseMessage(trans('user information updated successfully'), ['user' => $user]), 200);
        } catch (\Exception $e) {
            return response()->json(apiResponseMessage(trans('failed to update user information'), ['error' => $e->getMessage()]), 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        $user =  User::find($user_id);
        if (!$user){
            return response()->json(apiResponseMessage(trans('failed to delete a user'), ['error' => 'not valid user id']), 400);
        }else{
            $user->status = 'suspended';
            $user->save();
            $user->delete();
            return response()->json(apiResponseMessage(trans('user deleted successfully'), []), 200);

        }
    }


    /**
     * @param $user_id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function acceptDriver($user_id)
    {
        try{
            $user = User::find($user_id);
            $user->status = 'active';
            $user->save();
        }catch (\Exception $e){
            return response($e->getMessage());
        }

    }

    /**
     * @param $user_id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function declineDriver($user_id)
    {
        try{
            $user = User::find($user_id);
            $user->car->delete();
            $user->status = 'active';
            $user->type = 'rider';
            $user->save();
            return redirect('/');

        }catch (\Exception $e){
            return response($e->getMessage());
        }

    }
}
