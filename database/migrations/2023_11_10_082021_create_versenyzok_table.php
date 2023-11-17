<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('versenyzok', function (Blueprint $table) {
            $table->string("felhasznalo_nev");
            $table->string("felhasznalo_email");
            $table->string("fordulo_nev");
            $table->integer("fordulo_ev");
            $table->integer("fordulo_forduloszam");
            $table->primary(["felhasznalo_nev","felhasznalo_email","fordulo_nev","fordulo_ev","fordulo_forduloszam"]);
            $table->foreign(["fordulo_nev","fordulo_ev","fordulo_forduloszam"])->references(["verseny_nev","verseny_ev","forduloszam"])->on("fordulok");
            $table->foreign(["felhasznalo_nev","felhasznalo_email"])->references(["nev","email"])->on("felhasznalok");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('versenyzok');
    }
};
