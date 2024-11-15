<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountiesTable extends Migration
{
    public function up()
    {
        Schema::create('counties', function (Blueprint $table) {
            $table->id();
            $table->string('cname')->unique(); // County name
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('counties');
    }
}

