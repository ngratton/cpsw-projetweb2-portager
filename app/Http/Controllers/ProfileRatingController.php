<?php

namespace App\Http\Controllers;

use App\Profile;
use App\ProfileRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProfileRating::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $userId, $profileId)
    {
        $rating = new ProfileRating();
        // $rating->user_id = Auth::user()->id();
        $rating->user_id = $userId;
        $rating->rating = $request->rating;
        $rating->comment = $request->comment;
        $rating->profile_id = $profileId;
        $rating->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProfileRating  $profileRating
     * @return \Illuminate\Http\Response
     */
    public function show(ProfileRating $profileRating, $profileId)
    {
        return ProfileRating::where('profile_id', $profileId)->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProfileRating  $profileRating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $profileId)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProfileRating  $profileRating
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfileRating $profileRating, $commentId)
    {
        $comment = ProfileRating::find($commentId)->get();
        $comment->destroy();
    }
}
