<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetterController extends Controller
{
    public function getInstruments($songName) {
        
        $instruments = \App\Instruments::getInstrumentsOfSongByName($songName);
        $instrumentsJson = \GuzzleHttp\json_encode($instruments);
        
        print($instrumentsJson);
    }
    
    public function getPdfName($songName, $instrument) {
        $pdf_name = \App\Song::getSongPdfName($songName, $instrument);
        
        if(!empty($pdf_name)) {
            print($pdf_name[0]->pdf_name);
        }
    }
    
    public function getMatchingSongNames($songName)  {
        $possibleNames = \App\Song::getMatchingSong($songName);
        
        foreach ($possibleNames as $possibleName) {
            //dd($possibleNames);
           echo "<p>" . $possibleName->name . "</p>";
        }
    }
    
    public function test() {
       print(\App\Song::checkIfSongAlreadyExists("Arsenal"));
    }
}
