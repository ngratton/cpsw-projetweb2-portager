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
        return Profile::where('fk_users_id', $userId)->get();
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
        Profile::where('fk_users_id', $userId)
                ->update([
                    "bio" => $request->bio,
                    "profil_photo_path" => $request->profil_photo_path,
                    "jardine_depuis" => $request->jardine_depuis,
                    "tags_jardiniers" => $request->tags_jardiniers,
                ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
