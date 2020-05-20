<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->bigIncrements('id');
       
            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('photo_id')->nullbale();
            
            $table->string('act_name');
            $table->text('act_memory');
            $table->timestamps();

            $table->foreign('cat_id')->references('id')->on('categories');
            $table->foreign('photo_id')->references('id')->on('phototitles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
