<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('points')->default(0);
            $table->decimal('balance', 12, 2)->default(0);
            $table->decimal('pending_balance', 12, 2)->default(0);
            $table->string('referral_code', 16)->nullable()->unique();
            $table->unsignedBigInteger('referred_by')->nullable()->index();
            $table->string('role', 16)->default('user');
            $table->string('status', 16)->default('active');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['points', 'balance', 'pending_balance', 'referral_code', 'referred_by', 'role', 'status']);
        });
    }
};
