<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MusicSheetPageController extends Controller
{
    public function show($songName) {
        
        $instruments = \App\Instruments::getInstrumentsOfSongByName($songName);
        
        if (isset($_GET['i'])) {
            
            $userInstrument = $_GET['i'];
            foreach ($instruments as $instrument) {
                if (!strcmp($userInstrument, $instrument->name)) {
                    $name_of_pdf = \App\Song::getSongPdfName($songName, $userInstrument);
                    return view('musicSheetpage', [
                        'name_of_pdf' => $name_of_pdf[0]->pdf_name,
                        'selected_instrument' => $userInstrument,
                        'instruments' => $instruments,
                        'songName' => $songName
                    ]);
                }
            }
            
            abort('401');
        } else {
            
            abort('402');
            
        }
    }
}
