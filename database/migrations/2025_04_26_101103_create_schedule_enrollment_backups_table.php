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
        Schema::create('schedule_enrollment_backups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schedule_id')->constrained('course_schedules')->onDelete('cascade');
            $table->foreignId('holiday_id')->constrained('holidays')->onDelete('cascade');
            $table->date('original_start_enroll');
            $table->date('original_end_enroll');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_enrollment_backups');
    }
};
