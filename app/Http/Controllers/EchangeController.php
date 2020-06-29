<?php

namespace App\Http\Controllers;

use App\Echange;
use App\EchangeItems;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EchangeController extends Controller
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
        $echange = new Echange();
        $echange->id = Str::random(10);
        $echange->from_id = $request->from_id;
        $echange->to_id = $request->to_id;
        $echange->status = 'Offre initiale';
        $echange->save();

        return $echange->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Echange  $echange
     * @return \Illuminate\Http\Response
     */
    public function show(Echange $echange, $echangeId)
    {
        $echange = Echange::find($echangeId);
        $echange->items = EchangeItems::where('echange_id', $echangeId)->get();

        return $echange;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Echange  $echange
     * @return \Illuminate\Http\Response
     */
    public function edit(Echange $echange)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Echange  $echange
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Echange $echange)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Echange  $echange
     * @return \Illuminate\Http\Response
     */
    public function destroy(Echange $echange)
    {
        //
    }
}
