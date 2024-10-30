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
            $table->json('images')->nullable();
            $table->text('summary');
            $table->text('features')->nullable();
            $table->text('description')->nullable();
            $table->text('highlights')->nullable();
            $table->text('itinerary')->nullable();
            $table->text('terms_and_conditions')->nullable();
<<<<<<< HEAD
            $table->text('included')->nullable();
            $table->text('not_included')->nullable();
=======
>>>>>>> e309fa3c7707d0235c4051d2cf80e7baae6d459d
            $table->integer('days');
            $table->decimal('price', 8, 2);
            $table->boolean('status'); 
            $table->date('start_date')->nullable();
            $table->date('end_date');
            $table->foreignId('instructors_id')->constrained('instructors')->onDelete('cascade');
            $table->foreignId('accommodations_id')->constrained('accommodations')->onDelete('cascade');
            $table->foreignId('locations_id')->constrained('locations')->onDelete('cascade');
            $table->foreignId('categories_id')->constrained('categories')->onDelete('cascade');
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('packages');
    }
};
