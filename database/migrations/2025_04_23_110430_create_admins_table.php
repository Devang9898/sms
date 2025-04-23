<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void {
        Schema::create('admins', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key referencing 'users' table
            $table->string('first_name'); // Admin's first name
            $table->string('last_name'); // Admin's last name
            $table->string('phone_number'); // Admin's phone number
            $table->string('profile_picture')->nullable(); // Admin's profile picture (nullable)
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void {
        Schema::dropIfExists('admins'); // Drop the 'admins' table if rolling back the migration
    }
};
