<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\NullableType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->nullable(); // new field

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            // new fields down here
            $table->string('photo')->nullable();
            $table->string('phone')->nullable();
            $table->text('adress')->nullable();
            $table->enum('role', ['admin', 'agent', 'user'])->default('user'); // admin, agent, user
            $table->enum('status', ['active', 'inactive'])->default('active'); // admin, agent, user

            $table->string('username')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
