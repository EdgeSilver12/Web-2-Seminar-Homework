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
        Schema::create('towns', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->foreignId('county_id') // Foreign key reference to counties
                  ->constrained() // Set up the foreign key constraint
                  ->onDelete('cascade'); // Delete towns if the county is deleted
            $table->string('name'); // Column to hold the town name
            $table->timestamps(); // Created at and updated at fields
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('towns');
    }
};
