<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;

class TypeController extends Controller
{

    public function index()
    {
        return Type::all();
    }

    public function show($plantId)
    {
        return Type::where('plant_id', $plantId)->get();
    }
}
