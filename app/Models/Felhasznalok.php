<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Felhasznalok extends Model
{
    protected $table ="felhasznalok";
    public $timestamps=false;
    protected $fillable = ['nev','email','varos','telefonszam'];

    use HasFactory;
}
