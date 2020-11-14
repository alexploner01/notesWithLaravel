<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instruments extends Model
{
    public static function getInstrumentsOfSongByName($name) {
        
        $instruments = \DB::table('Lied')->select("instrument.name")->join('Note', 'note.l_id', '=', 'lied.l_id')->join('Note_instrument', 'note_instrument.n_id', '=', 'note.n_id')->join('Instrument', 'instrument.i_id', '=', 'note_instrument.i_id')->where('lied.name', '=', $name)->groupBy('name')->get();
        
        return $instruments;
        
    }
    
    public static function getAllInstruments() {
        $instruments = \DB::table('Instrument')->select('instrument.name')->get();
        
        return $instruments;
    }
    
    public static function getIdOfInstrument($instrument) {
        $i_id = \DB::table('Instrument')->select('instrument.i_id')->where('instrument.name', '=', $instrument)->get();
        return $i_id[0]->i_id;
    }
}
