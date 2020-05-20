<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('photo_id')->nullable();
            $table->unsignedBigInteger('res_id');
            $table->unsignedBigInteger('uni_id');
          
            $table->string('mem_name');
            $table->string('mem_email');
            $table->string('mem_age');
            $table->string('mem_phone');
            $table->string('mem_address');
            $table->longtext('mem_description'); 
            $table->timestamps();

            $table->foreign('photo_id')->references('id')->on('phototitles');
            $table->foreign('res_id')->references('id')->on('responsibles');
            $table->foreign('uni_id')->references('id')->on('universities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
