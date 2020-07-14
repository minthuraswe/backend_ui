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
            $table->unsignedBigInteger('year_id');
            
            $table->string('mem_name');
            $table->string('mem_email');
            $table->string('mem_age');
            $table->string('mem_phone');
            $table->text('mem_photo');
            $table->string('mem_address');
            $table->string('mem_link')->nullable();
            $table->string('mem_position');
            $table->string('mem_university');
            $table->longtext('mem_description'); 

            $table->timestamps();
            $table->foreign('year_id')->references('id')->on('yearofservices');
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
