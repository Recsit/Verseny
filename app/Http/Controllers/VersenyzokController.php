<?php

namespace App\Http\Controllers;

use App\Models\Versenyzok;
use Illuminate\Http\Request;
use function Laravel\Prompts\search;
use function Ramsey\Uuid\v1;
use function Ramsey\Uuid\v6;

class VersenyzokController extends Controller
{
    public function fetch(){
        $versenyzok =Versenyzok::all();
        return response()->json([
            'versenyzok'=>$versenyzok,
        ]);

    }
    public function store(Request $request){
        $versenyzok=new Versenyzok();

        $versenyzok->felhasznalo_nev=$request->felhasznalo_nev;
        $versenyzok->felhasznalo_email=$request->felhasznalo_email;
        $versenyzok->fordulo_nev=$request->fordulo_nev;
        $versenyzok->fordulo_ev=$request->fordulo_ev;
        $versenyzok->fordulo_forduloszam=$request->fordulo_forduloszam;

        $versenyzok->save();
    }
    public function destroy($id1,$id2,$id3,$id4,$id5){
        Versenyzok::where('felhasznalo_nev','=',$id1)->where('felhasznalo_email',"=",$id2)->where('fordulo_nev','=',$id3)->where('fordulo_ev','=',$id4)->where('fordulo_forduloszam','=',$id5)->delete();
    }
}
