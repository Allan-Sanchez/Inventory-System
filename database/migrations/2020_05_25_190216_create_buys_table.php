<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->text('description');
            // $table->float('price',8,2);
            $table->timestamps();
        });

        Schema::create('buys', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nameKit');
            $table->integer('quantity');
            $table->float('price',8,2);
            $table->unsignedBigInteger('state_id')->unsigned();
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
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
        
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('buys');
        Schema::dropIfExists('states');
        Schema::enableForeignKeyConstraints();
        // DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        // DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
