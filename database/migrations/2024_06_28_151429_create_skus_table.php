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
        Schema::create('skus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('manufacturer_id')->constrained('manufacturers');
            $table->foreignId('business_unit_id')->constrained('business_units');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('brand_id')->constrained('brands');
            $table->foreignId('master_sku_id')->constrained('master_skus');
            $table->string('sku_name');
            $table->string('sku_company_code')->nullable();
            $table->string('pack_type')->nullable();
            $table->string('variant')->nullable();
            $table->string('pack_size')->nullable();
            $table->string('attribute')->nullable();
            $table->string('sub_attribute')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skus');
    }
};
