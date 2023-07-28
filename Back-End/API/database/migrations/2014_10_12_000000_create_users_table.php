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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('image')->nullable();
            $table->enum('user_type', [1, 2, 3])->default(2);
            $table->boolean('user_status')->default(false);
            $table->unsignedInteger('applies_left')->default(15);
            $table->text('bio')->nullable();
            $table->string('field_title')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('password');
            $table->string('ban_message')->nullable();
            $table->softDeletes('banned_at');
            $table->timestamp('email_verified_at')->nullable();
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
