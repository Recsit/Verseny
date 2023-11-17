<?php

use App\Http\Controllers\FelhasznalokController;
use App\Http\Controllers\FordulokController;
use App\Http\Controllers\VersenyekController;
use App\Http\Controllers\VersenyzokController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});


Route::get("/fetchversenyek",[VersenyekController::class,'fetch']);
Route::get("/fetchversenyzok",[VersenyzokController::class,'fetch']);
Route::get("/fetchfordulokkey",[FordulokController::class,'fetch']);
Route::get("/fetchfelhasznalokkey",[FelhasznalokController::class,'fetch']);
Route::get("/fetchfordulok",[FordulokController::class,'fetch']);
Route::post('/versenyadd',[VersenyekController::class,'store']);
Route::post('/versenyzoadd',[VersenyzokController::class,'store']);
Route::delete('/versenyzodelete/{id}-{id2}-{id3}-{id4}-{id5}',[VersenyzokController::class,'destroy']);
Route::post('/forduloadd',[FordulokController::class,'store']);
