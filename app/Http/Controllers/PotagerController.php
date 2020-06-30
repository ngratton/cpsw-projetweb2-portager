<?php

namespace App\Http\Controllers;

use App\Potager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PotagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $potagers = Potager::all();

        foreach($potagers as $potager) {
            if($potager->tags_potagers) {
                // Transforme les tags de String à Array
                $tags = $potager->tags_potagers;
                $tagsTmp = explode(',', $tags);
                $potager->tags_potagers = $tagsTmp;
            }
        }

        return $potagers;
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
    public function store(Request $request, $userId)
    {
        $potager = new Potager();
        $potager->address_1 = $request->address_1;
        $potager->address_2 = $request->address_2;
        $potager->city = $request->city;
        $potager->prov = $request->prov;
        $potager->country = $request->country;
        $potager->postal_code = $request->postal_code;
        $potager->photos_path = $request->photos_path;
        $potager->tags_potagers = $request->tags_potagers;
        $potager->user_id = $userId;
        $potager->est_actif = 1;
        $potager->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Potager  $potager
     * @return \Illuminate\Http\Response
     */
    public function show($userId)
    {
        $potagers = Potager::where('user_id', $userId)->get();

        foreach($potagers as $potager) {
            if($potager->tags_potagers) {
                // Transforme les tags de String à Array
                $tags = $potager->tags_potagers;
                $tagsTmp = explode(',', $tags);
                $potager->tags_potagers = $tagsTmp;
            }
        }

        return $potagers;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Potager  $potager
     * @return \Illuminate\Http\Response
     */
    public function edit(Potager $potager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Potager  $potager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $userId)
    {
        $potager = Potager::where('user_id', $userId)->get();
        $potager->address_1 = $request->address_1;
        $potager->address_2 = $request->address_2;
        $potager->city = $request->city;
        $potager->prov = $request->prov;
        $potager->postal_code = $request->postal_code;
        $potager->photos_path = $request->photos_path;
        $potager->tags_potagers = $request->tags_potagers;
        $potager->user_id = $userId;
        $potager->est_actif = 1;
        $potager->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Potager  $potager
     * @return \Illuminate\Http\Response
     */
    public function destroy(Potager $potager, $userId)
    {
        $potager = Potager::where('user_id', $userId)->first();
        $potager->destroy();
    }

    /**
     * Ajoute une visite simple au potager - peut être spammé !
     *
     * @param  \App\Potager  $potager
     * @param  $userId passé dans la route depuis Vue
     * @return \Illuminate\Http\Response
     */
    public function addvisit(Potager $potager, $userId)
    {
        $potager = Potager::where('user_id', $userId)->first();
        $potager->potager_visits++;
        $potager->save();
    }

    /**
     *
     */
    public function mieuxCotesTous(Potager $potager) {
        return Potager::select('potagers.*', 'users.first_name', 'users.last_name')
            ->join('users', 'potagers.user_id', '=', 'users.id')
            ->orderBy('note_moy')
            ->paginate(20);
    }

    /**
     *
     */
    public function mieuxCotesAccueil(Potager $potager) {
        return Potager::select('potagers.*', 'users.first_name', 'users.last_name')
            ->join('users', 'potagers.user_id', '=', 'users.id')
            ->orderBy('note_moy')
            ->limit(4)
            ->get();
    }
}
