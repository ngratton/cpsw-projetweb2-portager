<?php

namespace App\Http\Controllers;

use App\User;
use App\RatingProfile;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
       $users = User::all(); 
       return $users;
    }

    public function showOne($userId)
    {
        return User::where('id', '=', $userId)->get();              
    }

    public function test($toUserId)
    {
        return User::where('id', '=', $toUserId)->get();              
    }

    public function showMany($profileId)
    {
        
        $ratingProfile = RatingProfile::where('profile_id', '=', $profileId)->get();

        return $ratingProfile;          
    }

    public function messages_avec($userId) {

        $liste_de_messages_par_user = Message::where('from_id', '=', $userId)->orWhere('to_id', '=', $userId)->get(); // to_id

        $liste_du_users = [];

        foreach ($liste_de_messages_par_user as $message) {
            if ($message->from_id == $userId) {
                $liste_du_users[] = User::where('id', '=', $message->to_id)->first();
            } else if ($message->to_id == $userId) {
                $liste_du_users[] = User::where('id', '=', $message->from_id)->first();
            }
        }

        $liste_du_users = array_unique($liste_du_users);

        return $liste_du_users;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user();
        return $user;
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
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
