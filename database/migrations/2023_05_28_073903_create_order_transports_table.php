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
        Schema::create('order_transports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transport_id');
            $table->unsignedBigInteger('driver_id');
            $table->unsignedBigInteger('boss_id');
            $table->boolean('acceptance_admin')->default(false);
            $table->boolean('acceptance_boss')->default(false);
            $table->dateTime('order_finish')->nullable();
            $table->foreign('transport_id')->references("id")->on("transports");
            $table->foreign('driver_id')->references("id")->on("users");
            $table->foreign('boss_id')->references("id")->on("users");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_transports');
    }
};
