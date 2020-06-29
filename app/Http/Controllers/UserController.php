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

    public function messages_avec($userId) {

        /**
         * Ce qu'on a
         *  - Utilisateur connecté ($userId)
         * 
         * Ce qu'on veut
         *  - envoyé par user connecté ($userId) : from_id
         *  - qui ont été envoyé à $userId : to_id
         * 
         * Return
         *  - Liste de Users? ou bien liste de ids (chiffres) 
         */

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
    public function show(User $user)
    {
        $user = Auth::id();
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
