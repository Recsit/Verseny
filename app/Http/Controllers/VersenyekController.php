<?php

namespace App\Http\Controllers;

use App\Models\Versenyek;
use Illuminate\Http\Request;


class VersenyekController extends Controller
{
    public function fetch(){
        $versenyek =Versenyek::all();
        return response()->json([
            'versenyek'=>$versenyek,
        ]);
    }
    public function store(Request $request){
        $verseny=new Versenyek;

        $verseny->nev=$request->input('nev');
        $verseny->ev=$request->input('ev');
        $verseny->tipus=$request->input('tipus');
        $verseny->helyszin=$request->input('helyszin');

        $verseny->save();
    }
}
