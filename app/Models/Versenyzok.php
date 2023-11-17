<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Versenyzok extends Model
{
    public $timestamps =false;
    protected $table ="versenyzok";
    protected $fillable = ['felhasznalo_nev','felhasznalo_email','fordulo_nev','fordulo_ev','fordulo_forduloszam'];
    protected $primaryKey=['felhasznalo_nev','felhasznalo_email','fordulo_nev','fordulo_ev','fordulo_forduloszam'];
    public $incrementing = false;

    use HasFactory;
}
