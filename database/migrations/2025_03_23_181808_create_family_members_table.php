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
        Schema::create('family_members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('birthdate');

            // Father, Son, Mother, Daugher etc.
            $table->string('member_type');

            // Family Relation
            $table->foreignId('family_id')
                ->constrained('families')
                ->cascadeOnDelete();

            // Member Type Relation
            $table->foreignId('member_type_id')
                ->constrained('member_types');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_members');
    }
};
