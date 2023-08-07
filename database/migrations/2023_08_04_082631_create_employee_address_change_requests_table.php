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
        Schema::create('employee_address_change_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->onDelete('cascade');
            $table->string('old_postal_code')->nullable();
            $table->string('new_postal_code')->nullable();
            $table->string('old_prefecture')->nullable();
            $table->string('new_prefecture')->nullable();
            $table->string('old_city')->nullable();
            $table->string('new_city')->nullable();
            $table->string('old_street_number')->nullable();
            $table->string('new_street_number')->nullable();
            $table->string('old_building_name')->nullable();
            $table->string('new_building_name')->nullable();
            $table->date('moving_date')->nullable();
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
        Schema::dropIfExists('employee_address_change_requests');
    }
};
