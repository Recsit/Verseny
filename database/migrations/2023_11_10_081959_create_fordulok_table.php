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
        Schema::create('fordulok', function (Blueprint $table) {
            $table->string("verseny_nev");
            $table->integer("verseny_ev");
            $table->integer("forduloszam");
            $table->primary(["verseny_nev","verseny_ev","forduloszam"]);
            $table->foreign(["verseny_nev","verseny_ev"])->references(["nev","ev"])->on("versenyek");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fordulok');
    }
};
