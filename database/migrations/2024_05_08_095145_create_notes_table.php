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
        Schema::create('notes', function (Blueprint $table) {
            $table->id("id_note")->autoIncrement();
            $table->integer("performance")->default(0);
            $table->integer("qualite_travail")->default(0);
            $table->integer("tenue_poste")->default(0);
            $table->integer("total")->default(0);
            $table->date("semaine");
            $table->foreignId("id_fk_tech")->references("id_tech")->on("Techniciens");
            $table->foreignId("id_fk_resp")->references("id")->on("Responsables");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
