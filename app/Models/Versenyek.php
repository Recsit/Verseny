<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Versenyek extends Model
{
    public $timestamps =false;
    protected $table ="versenyek";
    protected $fillable = ['nev','ev','tipus','helyszin'];
    use HasFactory;
}
