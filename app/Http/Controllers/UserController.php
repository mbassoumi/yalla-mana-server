<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            return response()->json(apiResponseMessage(trans('user registered successfully'), ['user' => $user]), 200);
        } catch (\Exception $e) {
            return response()->json(apiResponseMessage(trans('failed to register user'), ['error' => $e]), 400);
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
            $user = $user->update($attributes);
            return response()->json(apiResponseMessage(trans('user information updated successfully'), ['user' => $user]), 200);
        } catch (\Exception $e) {
            return response()->json(apiResponseMessage(trans('failed to update user information'), ['error' => $e]), 400);
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
            $user->delete();
            return response()->json(apiResponseMessage(trans('user deleted successfully'), []), 200);

        }
    }
}
