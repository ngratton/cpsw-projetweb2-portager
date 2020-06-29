<?php

namespace App\Http\Controllers;

use App\RatingPlant;
use Illuminate\Http\Request;

class RatingPlantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RatingPlant::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RatingPlant  $ratingPlant
     * @return \Illuminate\Http\Response
     */
    public function show(RatingPlant $ratingPlant, $plantId)
    {
        $rating = RatingPlant::where('plant_id', $plantId)->get();
        return $rating;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RatingPlant  $ratingPlant
     * @return \Illuminate\Http\Response
     */
    public function edit(RatingPlant $ratingPlant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RatingPlant  $ratingPlant
     * @return \Illuminate\Http\Response
     */
    public function destroy(RatingPlant $ratingPlant, $commentId)
    {
        $rating = RatingPlant::find($commentId);
        $rating->destroy();
    }
}
