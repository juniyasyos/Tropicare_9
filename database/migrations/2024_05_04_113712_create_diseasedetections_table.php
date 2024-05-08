<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiseasedetectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diseasedetections', function (Blueprint $table) {
            $table->id('DetectionID');
            $table->unsignedBigInteger('UserID')->nullable();
            $table->date('DetectionDate')->nullable();
            $table->string('PlantPhoto')->nullable();
            $table->unsignedBigInteger('DiseaseID')->nullable();
            $table->string('ResultDetection')->nullable();
            $table->foreign('UserID')->references('id')->on('users');
            $table->foreign('DiseaseID')->references('SolutionID')->on('diseasesolutions');
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
        Schema::dropIfExists('diseasedetections');
    }
}
