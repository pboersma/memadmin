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
        Schema::create('member_type_discounts', function (Blueprint $table) {
            $table->id();
            $table->string('category'); // e.g., 'Jeugd', 'Junior', 'Senior'
            $table->string('range'); // e.g., '0-7', '8-12', '13-17', '18-50', '51+
            $table->unsignedInteger('discount_percentage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_type_discounts');
    }
};
