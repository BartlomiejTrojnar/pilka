<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('symbol', 3)->unique();
            $table->string('name', 25);
            $table->string('continent', 20);
        });
    }

    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
