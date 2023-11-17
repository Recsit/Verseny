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
        Schema::create('felhasznalok', function (Blueprint $table) {
            $table->string('nev');
            $table->string('email')->unique();
            $table->string("varos");
            $table->string("telefonszam");
            $table->primary(['nev','email']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('felhasznalok');
    }
};
