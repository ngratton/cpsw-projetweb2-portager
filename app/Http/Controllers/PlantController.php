<?php

namespace App\Http\Controllers;

use Image;
use App\Plant;
use App\Potager;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $plant = new Plant();
        $plant->type_id = $request->type;
        $plant->description = $request->desc;
        $plant->est_actif = $request->actif;
        $plant->est_partage = $request->partage;
        $plant->potager_id = $request->potagerid;
        $plant->user_id = Auth::user();

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
    public function show(Plant $plant, $plantId)
    {
        $plant = (object) Plant::select('plants.*', 'types.*', 'profiles.note_moy AS note_user', 'users.first_name', 'users.last_name')
            ->where('plants.id', $plantId)
            ->join('types', 'plants.type_id', '=', 'types.id')
            ->join('profiles', 'plants.user_id', '=', 'profiles.id')
            ->join('users', 'plants.user_id', '=', 'users.id')
            ->first();

        return $plant;
    }

    /**
     * Affichage des plants de l'utilisateur connecté
     *
     * @param \App\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function plantsUser(Plant $plant, $userId) {
        // return Auth::user();
        $monPotager = Potager::where('user_id', $userId)->first();

        $mesPlants = Plant::
                where('potager_id', $monPotager->id)
                ->where('est_actif', 1)
                ->where('est_partage', 1)
                ->select('plants.*', 'types.nom')
                ->join('types', 'types.id', '=', 'plants.type_id')
                ->orderBy('nom')
                ->get();

        return $mesPlants;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plant $plant, $plantId)
    {
        $plant = new Plant();
        $plant->type_id = $request->type;
        $plant->description = $request->desc;
        $plant->est_actif = $request->actif;
        $plant->est_partage = $request->partage;
        $plant->potager_id = $request->potagerid;

        if($request->get('photo')) {
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
            $plant->photo = 'storage/images/plants/'.$fileNameOriginale;

            /**
             * Store une image miniature
             */
            // Obtienr l'image et la redimentionne l'image en 210 x 210 px (card)
            $imageMiniature = Image::make($imageData)->fit(210, 210, null, 'center');
            // Renomme l'image selon TIMESTAMP et ID UNIQUE + extension
            $fileNameMiniature = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
            $imageMiniature->save(public_path('storage/images/plants/miniatures/').$fileNameMiniature);
            // Ajout à la base de données
            $plant->photo_mini = 'storage/images/plants/miniatures/'.$fileNameMiniature;
        }

        // Sauvegarder la nouvelle plante
        $plant->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plant $plant, $plantId)
    {
        Plant::find($plantId)->destoy();
        return 'Supprimé';
    }

    /**
     * Désactiver un plan
     *
     * @param  \App\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function toggleActif(Plant $plant, $plantId)
    {
        $plant = Plant::find($plantId)->first();
        if($plant->est_actif === 0) {
            $plant->est_actif = 1;
        } else {
            $plant->est_actif = 0;
        }
    }

    /**
     * Active ou désactive le partage un plan
     *
     * @param  \App\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function togglePartage(Plant $plant, $plantId)
    {
        $plant = Plant::find($plantId)->first();
        if($plant->est_partage === 0) {
            $plant->est_partage = 1;
        } else {
            $plant->est_partage = 0;
        }
    }

    public function populaireTous(Plant $plant) {
        return Plant::all()
            ->sortBy('plants_visits')
            ->paginate(20);

    }

    public function populaireAccueil(Plant $plant) {
        return Plant::select('plants.*', 'types.nom', 'users.first_name', 'users.last_name', 'profiles.note_moy AS note_jard')
        ->join('types', 'plants.type_id', '=', 'types.id')
        ->join('users', 'plants.user_id', '=', 'users.id')
        ->join('profiles', 'plants.user_id', '=', 'profiles.user_id')
        ->orderBy('plants_visits')
        ->limit(4)
        ->get();
    }


    public function nouveauxPlantsAccueil(Plant $plant) {
        return Plant::select('plants.*', 'types.nom', 'users.first_name', 'users.last_name', 'profiles.note_moy AS note_jard')
        ->join('types', 'plants.type_id', '=', 'types.id')
        ->join('users', 'plants.user_id', '=', 'users.id')
        ->join('profiles', 'plants.user_id', '=', 'profiles.user_id')
        ->orderBy('created_at')
        ->limit(4)
        ->get();
    }


}
