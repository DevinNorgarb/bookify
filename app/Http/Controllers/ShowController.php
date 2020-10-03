<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Show;

class ShowController extends Controller
{
    public function index()
    {
        return response()->json(Show::all());
    }
}
