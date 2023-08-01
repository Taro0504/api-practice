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
        Schema::create('works', function (Blueprint $table) {
            $table->id('work_id');
            $table->foreignId('user_id')->constrained();
            $table->date('work_date');
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->time('fixed_start_time')->nullable();
            $table->time('fixed_end_time')->nullable();
            $table->text('fixed_time_reason')->nullable();
            $table->text('comment')->nullable();
            $table->text('absence_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('works');
    }
};
