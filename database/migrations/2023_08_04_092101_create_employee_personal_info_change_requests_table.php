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
        Schema::create('employee_personal_info_change_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->onDelete('cascade');
            $table->string('old_first_name')->nullable();
            $table->string('new_first_name')->nullable();
            $table->string('old_last_name')->nullable();
            $table->string('new_last_name')->nullable();
            $table->string('old_phone_number')->nullable();
            $table->string('new_phone_number')->nullable();
            $table->enum('status', ['申請中', '承認', '拒否']);
            $table->string('comment')->nullable();
            $table->foreignId('reviewed_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_personal_info_change_requests');
    }
};
