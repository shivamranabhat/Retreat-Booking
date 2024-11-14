<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('main_image')->nullable();
            $table->string('images')->nullable();
            $table->text('summary');
            $table->text('features')->nullable();
            $table->text('description')->nullable();
            $table->text('highlights')->nullable();
            $table->text('itinerary')->nullable();
            $table->text('terms_and_conditions')->nullable();
            $table->text('included')->nullable();
            $table->text('not_included')->nullable();
            $table->integer('days');
            $table->decimal('price', 8, 2);
            $table->boolean('status')->default(1); 
            $table->date('start_date')->nullable();
            $table->date('end_date');
            $table->foreignId('instructor_id')->constrained('instructors')->onDelete('cascade');
            $table->foreignId('accommodation_id')->constrained('accommodations')->onDelete('cascade');
            $table->foreignId('location_id')->constrained('locations')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('packages');
    }
};
