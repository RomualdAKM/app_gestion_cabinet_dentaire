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
        Schema::create('item_devis', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_dent');
            $table->foreignId('acte_id')->constrained()->cascadeOnDelete();
            $table->foreignId('code_id')->constrained()->cascadeOnDelete();
            $table->foreignId('devi_id')->constrained()->cascadeOnDelete();

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
        Schema::dropIfExists('item_devis');
    }
};
