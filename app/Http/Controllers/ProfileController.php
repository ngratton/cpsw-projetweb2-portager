<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
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
    public function store(Request $request, $userId)
    {
        $profile = new Profile();
        $profile->profil_photo_path = $request->profil_photo_path;
        $profile->bio = $request->bio;
        $profile->jardine_depuis = $request->jardine_depuis;
        $profile->tags_jardiniers = $request->tags_jardiniers;
        $profile->fk_users_id = $userId;
        $profile->est_actif = 1;
        $profile->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show($userId)
    {
        return Profile::where('fk_users_id', $userId)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $userId)
    {
        $profile = Profile::where('fk_users_id', $userId)->first();
        $profile->profil_photo_path = $request->profil_photo_path;
        $profile->bio = $request->bio;
        $profile->jardine_depuis = $request->jardine_depuis;
        $profile->tags_jardiniers = $request->tags_jardiniers;
        $profile->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile, $userId)
    {
        $potager = Potager::where('fk_users_id', $userId)->first();
        $potager->destroy();
    }

    /**
     * Ajoute une visite simple au potager - peut être spammé !
     *
     * @param  \App\Profile  $profile
     * @param  $userId passé dans la route depuis Vue
     * @return \Illuminate\Http\Response
     */
    public function addvisit(Profile $profile, $userId)
    {
        $profile = Profile::where('fk_users_id', $userId)->first();
        $profile->profile_visits++;
        $profile->save();
    }
}
