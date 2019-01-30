<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubsTable extends Migration
{
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 25);
            $table->string('city', 15);
            $table->integer('year_of_establishment');
            $table->integer('country_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('clubs', function ($table) {
            $table->foreign('country_id')->references('id')->on('clubs')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('clubs');
    }
}
