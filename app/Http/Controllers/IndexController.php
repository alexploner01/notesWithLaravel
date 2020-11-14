<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function show() {
        
        $songs = \App\Song::getAllSongs();
        $instruments = \App\Instruments::getAllInstruments();
        
        return view('welcome', [
                'songs' => $songs,
                'instruments' => $instruments
        ]);
    }
}
