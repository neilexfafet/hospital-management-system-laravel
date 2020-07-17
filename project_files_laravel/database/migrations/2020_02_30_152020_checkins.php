<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Checkins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('fee')->nullable();
            $table->string('status')->default('Pending');
            $table->unsignedBigInteger('roomno')->nullable();
            $table->unsignedBigInteger('roomtype')->nullable();
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->timestamps();
           
            $table->foreign('roomno')->references('id')->on('room_numbers')->onDelete('cascade');
            $table->foreign('roomtype')->references('id')->on('roomtypes')->onDelete('cascade');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
