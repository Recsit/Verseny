<?php

namespace App\Http\Controllers;

use App\Models\Felhasznalok;
use Illuminate\Http\Request;

class FelhasznalokController extends Controller
{
    public function fetch(){
        $felhasznalok =Felhasznalok::all();
        return response()->json([
            'felhasznalok'=>$felhasznalok,

        ]);
    }
}
