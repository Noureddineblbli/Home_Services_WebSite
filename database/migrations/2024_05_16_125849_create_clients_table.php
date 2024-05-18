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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->timestamps();
<<<<<<< HEAD:database/migrations/2024_05_01_172117_create_clients_table.php
            
=======
>>>>>>> 140e004676f533b88c78901482071f2c9e727b3a:database/migrations/2024_05_16_125849_create_clients_table.php
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
};
