<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model {

    public static function getAllSongs() {

        $songs = \DB::table('Lied')->get();
        return $songs;
    }

    public static function getSongPdfName($songName, $instrument) {
        $name_of_pdf = \DB::table('Lied')->select("Note.pdf_name")->join('Note', 'Note.l_id', '=', 'Lied.l_id')->join('Note_instrument', 'Note_instrument.n_id', '=', 'Note.n_id')->join('Instrument', 'Instrument.i_id', '=', 'Note_instrument.i_id')->where('Lied.name', '=', $songName)->where('Instrument.name', "=", $instrument)->get();
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
        $possibleNames = \DB::table('Lied')->select('Lied.name')->where('Lied.name', "like", "%" . $songName . "%")->limit(5)->get();

        return $possibleNames;
    }

    public static function checkIfSongAlreadyExists($songName) {
        $possibleNames = \DB::table('Lied')->select('Lied.name')->where('Lied.name', "=", $songName)->get();
        
        return (strcmp((string) $possibleNames, "[]"));
    }

    public static function getIdOfSongByName($songName) {
        $l_id = \DB::table('Lied')->select('Lied.l_id')->where('Lied.name', "=", $songName)->get();
        return $l_id[0]->l_id;
    }

}
