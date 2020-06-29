<?php

namespace App\Http\Controllers;

use App\EchangeItems;
use Illuminate\Http\Request;

class EchangeItemsController extends Controller
{
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
}
