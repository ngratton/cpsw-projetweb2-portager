<?php

namespace App\Http\Controllers;

use App\EchangeItems;
use Illuminate\Http\Request;

class EchangeItemsController extends Controller
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
        $echange_id = $request->echange_id;
        $items = $request->items;

        forEach($items as $item) {
            $ligne = new EchangeItems();
            $ligne->echange_id = $echange_id;
            $ligne->plant_id = $item['plant_id'];
            $ligne->user_id = $item['user_id'];
            $ligne->save();
        }

        return $echange_id;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EchangeItems  $echangeItems
     * @return \Illuminate\Http\Response
     */
    public function show(EchangeItems $echangeItems)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EchangeItems  $echangeItems
     * @return \Illuminate\Http\Response
     */
    public function edit(EchangeItems $echangeItems)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EchangeItems  $echangeItems
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EchangeItems $echangeItems)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EchangeItems  $echangeItems
     * @return \Illuminate\Http\Response
     */
    public function destroy(EchangeItems $echangeItems)
    {
        //
    }
}
