<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit_couleurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produit_id')->references('id')->on('produits')->onDelete('cascade');
            $table->foreignId('couleur_id')->references('id')->on('couleurs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produit_couleur');
    }
};