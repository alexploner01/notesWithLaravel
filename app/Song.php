<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model {

    public static function getAllSongs() {

        $songs = \DB::table('Lied')->get();
        return $songs;
    }

    public static function getSongPdfName($songName, $instrument) {
        $name_of_pdf = \DB::table('Lied')->select("note.pdf_name")->join('Note', 'note.l_id', '=', 'lied.l_id')->join('Note_instrument', 'note_instrument.n_id', '=', 'note.n_id')->join('Instrument', 'instrument.i_id', '=', 'note_instrument.i_id')->where('lied.name', '=', $songName)->where('instrument.name', "=", $instrument)->get();
        return $name_of_pdf;
    }

    public static function addSong($songName, $partitur, $instruments, $filename) {

        if (!self::checkIfSongAlreadyExists($songName)) {
            \DB::table('Lied')->insert(
                    ['name' => $songName]
            );
        }

        $l_id = self::getIdOfSongByName($songName);
        $filename = $filename . ".pdf";
        $n_id = \DB::table('Note')->insertGetId(
                ['pdf_name' => $filename, 'l_id' => $l_id, 'partitur' => $partitur]
        );

        foreach ($instruments as $instrument) {
            $i_id = Instruments::getIdOfInstrument($instrument);
            \DB::table('Note_Instrument')->insert(
                    ['n_id' => $n_id, 'i_id' => $i_id]
            );
        }
    }

    public static function getMatchingSong($songName) {
        $possibleNames = \DB::table('Lied')->select('lied.name')->where('lied.name', "like", "%" . $songName . "%")->get();

        return $possibleNames;
    }

    public static function checkIfSongAlreadyExists($songName) {
        $possibleNames = \DB::table('Lied')->select('lied.name')->where('lied.name', "=", $songName)->get();
        
        return (strcmp((string) $possibleNames, "[]"));
    }

    public static function getIdOfSongByName($songName) {
        $l_id = \DB::table('Lied')->select('lied.l_id')->where('lied.name', "=", $songName)->get();
        return $l_id[0]->l_id;
    }

}
