<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instruments extends Model
{
    public static function getInstrumentsOfSongByName($name) {
        
        $instruments = \DB::table('Lied')->select("Instrument.name", "Note.partitur")->join('Note', 'Note.l_id', '=', 'Lied.l_id')->join('Note_instrument', 'Note_instrument.n_id', '=', 'Note.n_id')->join('Instrument', 'Instrument.i_id', '=', 'Note_instrument.i_id')->where('Lied.name', '=', $name)->orderBy('Instrument.i_id', 'asc')->get();
        
        return $instruments;
        
    }
    
    public static function getAllInstruments() {
        $instruments = \DB::table('Instrument')->select('Instrument.name')->get();
        
        return $instruments;
    }
    
    public static function getIdOfInstrument($instrument) {
        $i_id = \DB::table('Instrument')->select('Instrument.i_id')->where('Instrument.name', '=', $instrument)->get();
        return $i_id[0]->i_id;
    }
}
