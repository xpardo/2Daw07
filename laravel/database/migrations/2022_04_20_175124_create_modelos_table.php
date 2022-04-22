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
            $table->id();
            $table->string('manufacturer');
            $table->string('model');
            $table->unsignedBigInteger('photo_id');
            $table->foreign('photo_id')->references('id')->on('files');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categorias');
            $table->string('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('modelos', function(Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['photo_id']);
        });
        Schema::dropIfExists('modelos');
    }
}
