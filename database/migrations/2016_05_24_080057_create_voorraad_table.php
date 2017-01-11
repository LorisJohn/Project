<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoorraadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Voorraad', function (Blueprint $table) {
            $table->integer('locatieCode')->unsigned();
            $table->foreign('locatieCode')
                  ->references('locatieCode')
                  ->on('Locatie');

            $table->integer('productCode')->unsigned();
            $table->foreign('productCode')
                  ->references('productCode')
                  ->on('Artikel');

            $table->integer('aantal');

            $table->primary(['locatieCode', 'productCode']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Voorraad');
    }
}
