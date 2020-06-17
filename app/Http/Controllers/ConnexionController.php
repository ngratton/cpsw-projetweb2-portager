<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class ConnexionController extends Controller
{
    public function connexion(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($request->only('email', 'password'))) {
            return response()->json(Auth::user(), 200);
        }

        throw ValidationException::withMessages(([
            'email' => ['Les informations fournies sont incorrectes.'],
        ]));
    }

    public function deconnexion()
    {
        Auth::logout();
    }
}
