<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fordulok extends Model
{
    public $timestamps =false;
    protected $table ="fordulok";
    protected $fillable = ['verseny_nev','verseny_ev','forduloszam'];

    use HasFactory;
}
