<?php

namespace App\Http\Controllers;

use App\RatingPotager;
use Illuminate\Http\Request;

class RatingPotagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RatingPotager::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $userId, $potagerId)
    {
        $rating = new RatingPotager();
        // $rating->user_id = Auth::user()->id();
        $rating->user_id = $userId;
        $rating->rating = $request->rating;
        $rating->comment = $request->comment;
        $rating->potager_id = $potagerId;
        $rating->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RatingPotager  $ratingPotager
     * @return \Illuminate\Http\Response
     */
    public function show(RatingPotager $ratingPotager, $potagerId)
    {
        return RatingPotager::where('potager_id', $potagerId)->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RatingPotager  $ratingPotager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $potagerId)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RatingPotager  $ratingPotager
     * @return \Illuminate\Http\Response
     */
    public function destroy(RatingPotager $ratingPotager, $commentId)
    {
        $comment = RatingPotager::find($commentId)->get();
        $comment->destroy();
    }

    /**
     * Calcule la moyenne de note pour ce plant.
     *
     * @param  \App\RatingPotager  $ratingPotager
     * @param  $commentId
     * @return \Illuminate\Http\Response
     */
    public function average(RatingPotager  $ratingPotager, $potagerId)
    {
        $evaluations = RatingPotager::where('potager_id', $potagerId)->get();

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
