<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Import DB facade
use Illuminate\Support\Facades\Hash; // Import Hash facade

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create user_designations table
        Schema::create('user_designations', function (Blueprint $table) {
            $table->id();
            $table->string('designation_name');
            $table->string('status');
            $table->timestamps();
        });

        // Insert default designations
        DB::table('user_designations')->insert([
            ['designation_name' => 'Admin', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['designation_name' => 'Manufacturer', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['designation_name' => 'Distributor', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['designation_name' => 'Retailer', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['designation_name' => 'User', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Create users table
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_designation_id')->constrained('user_designations'); // Foreign key to user_designations table
            $table->string('user_name');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('added_by')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        // Insert default admin user
        DB::table('users')->insert([
            'user_designation_id' => 1, // Admin designation ID
            'user_name' => 'salesfloadmin',
            'first_name' => 'Ahtisham',
            'last_name' => 'Saleem',
            'phone' => '1234567890',
            'email' => 'salesfloadmin@mailinator.com',
            'password' => Hash::make('Salesflo'), // Change this to a secure password
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create password_reset_tokens table
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Create sessions table
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('user_designations');
    }
};
