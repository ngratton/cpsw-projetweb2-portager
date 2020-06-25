<?php

namespace App\Http\Controllers;

use App\Profile;
use App\RatingProfile;
use Illuminate\Http\Request;

class RatingProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RatingProfile::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $profileId)
    {
        $rating = new RatingProfile();
        $rating->user_id = $request->user_id;
        // $rating->user_id = Auth::id();
        $rating->rating = $request->rating;
        $rating->comment = $request->comment;
        $rating->profile_id = $profileId;
        $rating->save();

        // Une fois la nouvelle note ajoutée, calcule de la note moyenne
        $evaluations = RatingProfile::where('profile_id', $profileId)->get();

        $total = 0;
        $count = 0;

        foreach($evaluations as $note) {
            $total += $note->rating;
            $count++;
        }

        $avg = round(($total / $count), 1);

        // Enregister la moyenne dans
        $profile = Profile::find($profileId);
        $profile->note_moy = $avg;
        $profile->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RatingProfile  $ratingProfile
     * @return \Illuminate\Http\Response
     */
    public function show(RatingProfile $ratingProfile, $profileId)
    {
        return RatingProfile::where('profile_id', $profileId)->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RatingProfile  $ratingProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $profileId)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RatingProfile  $ratingProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(RatingProfile $ratingProfile, $commentId)
    {
        $comment = RatingProfile::find($commentId)->get();
        $comment->destroy();
    }

    /**
     * Calcule la moyenne de note pour ce plant.
     *
     * @param  \App\RatingProfile  $ratingProfile
     * @param  $commentId
     * @return \Illuminate\Http\Response
     */
    public function average(RatingProfile  $ratingProfile, $profileId)
    {
        $evaluations = RatingProfile::where('profile_id', $profileId)->get();

        $total = 0;
        $count = 0;

        foreach($evaluations as $note) {
            $total = $total + $note->rating;
            $count++;
        }

        $avg = round(($total / $count), 1);

        return $avg;
    }
}
