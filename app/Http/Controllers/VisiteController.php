<?php

namespace App\Http\Controllers;

use App\Visite;
use Illuminate\Http\Request;

class VisiteController extends Controller
{
    public function hit(Request $request) {
        $visite = new Visite();
        $visite->page = $request->page;
        $visite->visiteur = $request->visiteur;
        $visite->save();
    }
}
