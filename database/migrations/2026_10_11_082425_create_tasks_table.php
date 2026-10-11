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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->unsignedTinyInteger('status')->default(1);
            $table->unsignedTinyInteger('priority')->default(2);
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete();
            $table->date('due_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(['project_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
