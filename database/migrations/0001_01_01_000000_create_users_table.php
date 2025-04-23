<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        // Creating the 'users' table
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique(); // Email column, unique to prevent duplicates
            // $table->string('password'); // Password column for storing hashed passwords
            $table->enum('role', ['admin', 'student']); // Role column to define if user is an admin or student
            $table->timestamps(); // Laravel timestamps (created_at and updated_at)
        });

        // Creating the 'password_reset_tokens' table
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary(); // Email as primary key
            $table->string('token'); // Token for resetting passwords
            $table->timestamp('created_at')->nullable(); // When the token was created
        });

        // Creating the 'sessions' table to store session data
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // Session ID as the primary key
            $table->foreignId('user_id')->nullable()->index(); // User ID referencing the user table
            $table->string('ip_address', 45)->nullable(); // IP address of the user
            $table->text('user_agent')->nullable(); // User's agent (browser, OS)
            $table->longText('payload'); // Payload for session data
            $table->integer('last_activity')->index(); // Timestamp for last activity
        });
    }

    public function down(): void {
        // Drop the 'users', 'password_reset_tokens', and 'sessions' tables if rolling back
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
