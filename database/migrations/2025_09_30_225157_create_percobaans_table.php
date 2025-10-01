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
        Schema::create('percobaans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        // Contoh : dari Student
        // Schema::create('takes', function (Blueprint $table) {
        //     $table->id();
        //     $table->dateTime('enroll_date');
        //     $table->unsignedBigInteger('student_id');
        //     $table->unsignedBigInteger('course_id');
        //     $table->timestamps();

        //     $table->foreign('student_id')
        //         ->references('student_id')->on('students')
        //         ->cascadeOnUpdate()
        //         ->restrictOnDelete();

        //     $table->foreign('course_id')
        //         ->references('course_id')->on('courses')
        //         ->cascadeOnUpdate()
        //         ->restrictOnDelete();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('percobaans');
    }
};
