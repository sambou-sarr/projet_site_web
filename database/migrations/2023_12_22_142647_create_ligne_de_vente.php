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
        Schema::create('ligne_de_ventes', function (Blueprint $table) {
            $table->id();
            $table->float('montant');
            $table->float('quantite');
            $table->integer('id_prod');
            $table->integer('id_vente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ligne_de_ventes');
    }
};
