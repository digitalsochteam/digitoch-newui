<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();

            // required fields
            $table->text('review');                 // customer review
            $table->string('name');                 // reviewer name
            $table->string(column: 'designation');          // job title or role
            $table->unsignedTinyInteger('star');    // rating 1–5

            // optional field
            $table->string('image')->nullable();    // path to image, nullable

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};