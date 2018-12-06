<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefereesTable extends Migration
{
    public function up()
    {
        Schema::create('referees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 25)->nullable();
            $table->string('last_name', 25);
            $table->integer('country_id')->unsigned();
            $table->string('district', 25)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->boolean('active')->default(0);
            $table->timestamps();
        });

        Schema::table('referees', function ($table) {
            $table->foreign('country_id')->references('id')->on('countries')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::table('referees', function ($table) {
            $table->dropForeign('referees_country_id_foreign');
        });

        Schema::dropIfExists('referees');
    }
}
