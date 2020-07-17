<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Medhistories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medhistories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bp')->nullable();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->string('bloodsugar')->nullable();
            $table->string('cbc')->nullable();
            $table->string('bodytemp')->nullable();
            $table->string('medprescription')->nullable();
            $table->string('comments')->nullable();
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
            
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');

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
