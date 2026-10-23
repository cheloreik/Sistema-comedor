<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EntregaController extends Controller
{
    public function index()
    {
        return view('entregas.index');
    }
}
