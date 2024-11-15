<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePopulationsTable extends Migration
{
    public function up()
    {
        Schema::create('populations', function (Blueprint $table) {
            $table->unsignedBigInteger('townid'); // Foreign key
            $table->year('ryear'); // Year of data recording
            $table->unsignedInteger('women'); // Number of women
            $table->unsignedInteger('total'); // Total population
            $table->timestamps();

            // Composite primary key
            $table->primary(['townid', 'ryear']);

            // Foreign key constraint
            $table->foreign('townid')->references('id')->on('towns')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('populations');
    }
}
