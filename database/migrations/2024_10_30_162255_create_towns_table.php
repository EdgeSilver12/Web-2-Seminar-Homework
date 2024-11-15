<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTownsTable extends Migration
{
    public function up()
    {
        Schema::create('towns', function (Blueprint $table) {
            $table->id();
            $table->string('tname')->unique(); // Town name
            $table->unsignedBigInteger('countyid'); // Foreign key
            $table->boolean('countyseat')->default(false); // Is county seat?
            $table->boolean('countylevel')->default(false); // County level rights
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('countyid')->references('id')->on('counties')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('towns');
    }
}
