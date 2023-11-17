<?php

namespace App\Http\Controllers;

use App\Models\Fordulok;
use Illuminate\Http\Request;

class FordulokController extends Controller
{
    public function fetch(){
        $fordulok =Fordulok::all();
        return response()->json([
            'fordulok'=>$fordulok,

        ]);
    }
    public function store(Request $request){
        $fordulok=new Fordulok;

        $fordulok->verseny_nev=$request->verseny_nev;
        $fordulok->verseny_ev=$request->verseny_ev;
        $fordulok->forduloszam=$request->fordulo;

        $fordulok->save();
    }
}
