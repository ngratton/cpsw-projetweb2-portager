<?php

namespace App\Http\Controllers;

use App\Plant;
use Illuminate\Http\Request;
use Image;
use Carbon\Carbon;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Plant::all();
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
        $plant = new Plant();
        $plant->fk_types_id = $request->type;
        $plant->description = $request->desc;
        $plant->est_actif = $request->actif;
        $plant->est_partage = $request->partage;
        $plant->fk_potagers_id = $request->potagerid;

        // Nom de la photo
        $imageData = $request->get('photo');

        /**
         * Store l'image originale
         */
        $imageOriginale = Image::make($imageData);
        // Renomme l'image selon TIMESTAMP et ID UNIQUE + extension
        $fileNameOriginale = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
        $imageOriginale->save(public_path('storage/images/plants/').$fileNameOriginale);
        // Ajout à la base de données
        $plant->photo = './storage/images/plants/'.$fileNameOriginale;

        /**
         * Store une image miniature
         */
        // Obtienr l'image et la redimentionne l'image en 210 x 210 px (card)
        $imageMiniature = Image::make($imageData)->fit(210, 210, null, 'center');
        // Renomme l'image selon TIMESTAMP et ID UNIQUE + extension
        $fileNameMiniature = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
        $imageMiniature->save(public_path('storage/images/plants/miniatures/').$fileNameMiniature);
        // Ajout à la base de données
        $plant->photo_mini = './storage/images/plants/miniatures/'.$fileNameMiniature;

        // Sauvegarder la nouvelle plante
        $plant->save();

        return 'Succes';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function show(Plant $plant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function edit(Plant $plant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plant $plant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plant $plant)
    {
        //
    }
}
