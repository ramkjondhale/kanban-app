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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedTinyInteger('role')->default(5)->after('password');
            $table->foreignId('manager_id')->nullable()->after('role')->constrained('users')->nullOnDelete();
            $table->boolean('is_active')->default(true)->after('manager_id');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['manager_id']);
            $table->dropColumn(['role', 'manager_id', 'is_active']);
            $table->dropSoftDeletes();
        });
    }
};
