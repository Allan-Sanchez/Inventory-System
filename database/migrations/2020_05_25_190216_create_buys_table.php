<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('state');
            $table->string('name');
            $table->float('price',8,2);
            $table->timestamps();
        });

        Schema::create('buys', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nameKit');
            $table->integer('quantity');
            $table->float('price',8,2);
            $table->unsignedBigInteger('state_id')->unsigned();
            $table->foreign('state_id')->references('id')->on('states');
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
        Schema::dropIfExists('buys');
        Schema::dropIfExists('states');
    }
}
