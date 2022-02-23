<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("desc");
            $table->unsignedBigInteger('status_id')->references('id')->on('statuses');
            $table->unsignedBigInteger('author_id')->references('id')->on('users'); 
            $table->unsignedBigInteger("assigned_id");
            $table->timestamps();
            
        });
        /* Schema::table('statuses', function (Blueprint $table) {
            $table->unsignedBigInteger('status_id')                  
                  ->nullable();
            $table->foreign('status_id')
                  ->references('id')->on('status')
                  ->onUpdate('cascade')
                  ->onDelete('set null');
        }); */
        /* Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('author_id')                  
                  ->nullable();
            $table->foreign('author_id')
                  ->references('id')->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('set null');
        }); */
        // Call seeder
        Artisan::call('db:seed', [
            '--class' => 'RoleSeeder',
            '--force' => true // <--- add this line
        ]);

        $response = $this->post ('/post',[
            
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
