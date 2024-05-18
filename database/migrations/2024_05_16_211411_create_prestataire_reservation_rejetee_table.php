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
        Schema::create('prestataire_reservation_rejetee', function (Blueprint $table) {
            $table->unsignedBigInteger('prestataire_id');
            $table->unsignedBigInteger('reservation_id');
            $table->foreign('prestataire_id')->references('id')->on('service_providers')->onDelete('cascade');
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
            $table->primary(['prestataire_id', 'reservation_id']);
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestataire_reservation_rejetee');
    }
};
