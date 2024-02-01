<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HolaController extends Controller
{
    public function __invoke()
    {
        return "Hola mundo UwU.";
    }

    public function show($nombre) {
        $data['nombre'] = $nombre;
        return view('hola', $data);
    }

}
