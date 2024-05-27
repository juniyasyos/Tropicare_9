<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diseasedetection__solutions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('SolutionID')->nullable();
            $table->unsignedBigInteger('DetectionID')->nullable();
            $table->timestamps();

            // Tambahkan foreign key constraint
            $table->foreign('SolutionID')->references('SolutionID')->on('diseasesolutions')->onDelete('set null');
            $table->foreign('DetectionID')->references('DetectionID')->on('diseasedetections')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diseasedetection__solutions');
    }
};
