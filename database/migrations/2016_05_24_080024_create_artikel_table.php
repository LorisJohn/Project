<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtikelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Artikel', function (Blueprint $table) {
            $table->increments('productCode');
            $table->string('product');
            $table->string('type');

            $table->integer('fabrieksCode')->unsigned();
            $table->foreign('fabrieksCode')
                  ->references('fabrieksCode')
                  ->on('Fabriek');

            $table->double('inkoopprijs');
            $table->double('verkoopprijs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Artikel');
    }
}
