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
        Schema::create('employee_family_change_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->onDelete('cascade');
            $table->foreignId('family_id')->constrained('employee_families')->onDelete('cascade');
            $table->string('old_relationship')->nullable();
            $table->string('new_relationship')->nullable();
            $table->string('old_family_member_name')->nullable();
            $table->string('new_family_member_name')->nullable();
            $table->date('old_birth_date')->nullable();
            $table->date('new_birth_date')->nullable();
            $table->boolean('old_is_dependent')->nullable();
            $table->boolean('new_is_dependent')->nullable();
            $table->enum('status', ['申請中', '承認', '拒否']);
            $table->string('comment')->nullable();
            $table->timestamps();
            $table->foreignId('reviewed_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('reviewed_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_family_change_requests');
    }
};
