<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('modelos', function (Blueprint $table) {
            $table -> id();
            $table -> string('manufacturer');
            $table -> string('model');
            $table -> integer('photo_id')->nullable();
            $table -> foreignId('category_id')->references('id')->on('categorias');
            $table -> decimal('price', 5,2);
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modelos');
    }
}
