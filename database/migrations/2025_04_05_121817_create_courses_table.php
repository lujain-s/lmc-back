<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('TeacherId')->constrained('users');
            $table->foreignId('LanguageId')->constrained('languages');
            $table->string('Description');
            $table->string('Photo')->nullable();
            $table->enum('Status', ['Active','Unactive','Done'])->default('Unactive');
            $table->string('Level');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
