<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('offerwalls', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->string('url', 2000)->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('offer_completions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('offerwall_id')->constrained()->cascadeOnDelete();
            $table->string('external_id');
            $table->unsignedInteger('points');
            $table->timestamps();
            $table->unique(['offerwall_id', 'external_id']);
        });

        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('url', 2000)->nullable();
            $table->unsignedInteger('points')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('task_completions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('task_id')->constrained()->cascadeOnDelete();
            $table->unsignedInteger('points');
            $table->timestamps();
            $table->unique(['user_id', 'task_id']);
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('type', 20);          // offer, task, referral, withdrawal
            $table->string('description');
            $table->integer('points')->default(0);
            $table->decimal('amount', 12, 2)->default(0);
            $table->string('status', 16)->default('completed'); // completed, pending, rejected
            $table->string('reference')->nullable();
            $table->timestamps();
            $table->index(['user_id', 'type']);
        });

        Schema::create('withdrawals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('transaction_id')->nullable();
            $table->string('method');
            $table->decimal('amount', 12, 2);
            $table->string('account_details');
            $table->string('status', 16)->default('pending'); // pending, approved, rejected
            $table->string('admin_note')->nullable();
            $table->timestamp('processed_at')->nullable();
            $table->timestamps();
        });

        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('subject');
            $table->text('message');
            $table->string('status', 16)->default('open'); // open, closed
            $table->text('admin_reply')->nullable();
            $table->timestamps();
        });

        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('subject');
            $table->text('message');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        foreach (['contact_messages', 'tickets', 'withdrawals', 'transactions', 'task_completions', 'tasks', 'offer_completions', 'offerwalls'] as $t) {
            Schema::dropIfExists($t);
        }
    }
};
