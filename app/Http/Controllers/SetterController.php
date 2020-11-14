<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SetterController extends Controller {

    public function uploadNewSong(Request $request) {

        /* if(isset($_POST['name'])) {            
          \App\Song::addSong("hoho");
          } */

        $target_dir = "files/";

        $songName = $request->songName;
        $instruments = \GuzzleHttp\json_decode($request->instruments);
        $partitur = $request->partitur;

        $filename = $_FILES["file"]["name"];
        $file_hashname = sha1(basename($filename . random_bytes(50)));
        $target_file = $target_dir . $file_hashname . ".pdf";


        if (isset($_FILES["file"])) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {

                \App\Song::addSong($songName, $partitur, $instruments, $file_hashname);

                return response()->json(['status' => 'success']);
            } else {
                return response()->json(['status' => "failure"]);
            }
        } else {
            return response()->json(['status' => "failure"]);
        }
    }

}
