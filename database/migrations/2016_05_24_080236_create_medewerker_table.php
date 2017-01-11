<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedewerkerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Medewerker', function (Blueprint $table) {
            $table->integer('medewerkersCode');
            $table->string('voorletters');
            $table->string('voorvoegsels')->nullable();
            $table->string('achternaam');
            $table->string('gebruikersnaam');
            $table->string('wachtwoord');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Medewerker');
    }
}
