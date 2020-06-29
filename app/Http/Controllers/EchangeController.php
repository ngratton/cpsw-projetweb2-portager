<?php

namespace App\Http\Controllers;

use App\Plant;
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
        return Echange::all()->paginate(25);
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
        $echange->items = EchangeItems::where('echange_id', $echangeId)
                    ->select('echange_items.*', 'plants.*', 'types.nom')
                    ->join('plants', 'echange_items.plant_id', '=', 'plants.id')
                    ->join('types', 'plants.type_id', '=', 'types.id')
                    ->get();

        return $echange;
    }

    /**
     * Show the form for closing the specified resource.
     *
     * @param  \App\Echange  $echange
     * @return \Illuminate\Http\Response
     */
    public function complete(Echange $echange, $echangeId)
    {
        $echange = Echange::find($echangeId);
        $echange->status = 'Confirmée';
        $echange->est_actif = 0;

        $items = EchangeItems::where('echange_id', $echangeId)->get();
        foreach($items as $item) {
            $plant = Plant::where('id', $item->plant_id)->first();
            $plant->est_partage = 0;
            $plant->est_actif = 0;
            $plant->save();

            $item->est_actif = 0;
            $item->save();
        }

        $echange->save();

        return 'Succès !';
    }

    /**
     * Cancel the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Echange  $echange
     * @return \Illuminate\Http\Response
     */
    public function cancel(Echange $echange, $echangeId)
    {
        $echange = Echange::find($echangeId);
        $echange->status = 'Annulée';
        $echange->est_actif = 0;
        $echange->save();
    }
}
