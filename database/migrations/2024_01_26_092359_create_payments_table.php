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
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('amount',20,2)->default(0);
            $table->decimal('usd_rate');
            $table->decimal('amount_usd',20,2);
            $table->timestamp('date');

            $table->integer('client_id')->unsigned()->nullable();
            $table->boolean('is_deteled')->default(false);
            $table->integer('caisher_id')->unsigned()->nullable();

            $table->timestamps();

            $table->foreign('client_id')->on('clients')->references('id');
            $table->foreign('caisher_id')->on('caishers')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
