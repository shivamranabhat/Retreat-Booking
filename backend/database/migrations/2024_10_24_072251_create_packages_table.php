<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->text('images')->nullable(); // VARCHAR(MAX)
            $table->string('summary', 1000)->nullable();
            $table->string('features', 1000)->nullable();
            $table->string('description', 1000)->nullable();
            $table->string('benefits', 1000)->nullable();
            $table->string('program', 1000)->nullable();
            $table->unsignedBigInteger('instructor_id')->nullable();
            $table->unsignedBigInteger('accommodation_id')->nullable();
            $table->string('facilities', 1000)->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();

            // Foreign key constraints (assuming these tables exist)
            $table->foreign('instructor_id')->references('id')->on('instructors')->onDelete('set null');
            $table->foreign('accommodation_id')->references('id')->on('accommodations')->onDelete('set null');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
