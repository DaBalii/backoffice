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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable(false);
            $table->string("address")->nullable(false);
            $table->integer("num_tel")->nullable(false);
            $table->date("date_arr")->nullable(false);
            $table->integer("duration")->nullable(false);
            $table->unsignedBigInteger("id_admin")->nullable(false);
            $table->foreign("id_admin")->references("id")->on("admins")->onDelete("cascade");
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
        Schema::dropIfExists('reservations');
    }
};
