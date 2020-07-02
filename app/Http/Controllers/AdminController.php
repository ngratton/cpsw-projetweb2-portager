<?php

namespace App\Http\Controllers;

use App\User;
use App\Plant;
use App\Visite;
use App\Echange;
use App\Potager;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $total_users = User::all()->count();
        $total_users = is_null($total_users) ? 0 : $total_users;

        $total_plants = Plant::all()->count();
        $total_plants = is_null($total_plants) ? 0 : $total_plants;

        $total_echanges = Echange::all()->count();
        $total_echanges = is_null($total_echanges) ? 0 : $total_echanges;

        $page_populaire = Visite::all()->count();

        $users_wk = User::all();

        return view('admin.index', [
            'total_users' => $total_users,
            'total_plants' => $total_plants,
            'total_echanges' => $total_echanges,
            'page_populaire' => $page_populaire,
        ]);
    }

    public function usersIndex()
    {
        $users = User::all();

        return view('admin.users', ['users' => $users]);
    }

    public function userShow($userId)
    {
        $user = User::find($userId);
        $user_profile = User::find($userId)->profile;
        $user_potager = User::find($userId)->potager;
        $user_plants = User::find($userId)->plants;

        return view('admin.user', [
            'user' => $user,
            'profile' => $user_profile,
            'potager' => $user_potager,
            'plants' => $user_plants,
        ]);
    }

    public function potagersIndex()
    {
        $potagers = Potager::all();

        return view('admin.index', ['titre' => 'potagersIndex']);
    }

    public function potagerShow($userId)
    {
        return view('admin.index', ['titre' => 'potagerShow']);
    }

    public function plantsTypes()
    {
        $plants = Plant::all();

        return view('admin.index', ['titre' => 'echangesIndex']);
    }

    public function echangesIndex()
    {
        return view('admin.index', ['titre' => 'echangesIndex']);
    }

    public function echangeShow($echangeId)
    {
        return view('admin.index', ['titre' => 'echangeShow']);
    }

    public function visites()
    {
        return view('admin.visites', ['titre' => 'Visites']);
    }

}
