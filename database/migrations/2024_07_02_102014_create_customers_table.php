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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_code')->unique();
            $table->string('customer_name');
            $table->string('customer_company_code');
            $table->enum('customer_status', ['active', 'inactive'])->default('active');
            $table->string('customer_channel');
            $table->string('customer_sub_channel');
            $table->text('customer_address');
            $table->string('contact_person')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('email')->nullable();
            $table->string('cnic')->nullable();
            $table->date('cnic_expiry')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
