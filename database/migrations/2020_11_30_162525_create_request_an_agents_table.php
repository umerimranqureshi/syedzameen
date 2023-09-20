<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestAnAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_an_agents', function (Blueprint $table) {
            $table->id();
            $table->string('message');
            $table->foreignId('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
           
            $table->foreignId('post_id')
            ->references('id')
            ->on('posts')
            ->onDelete('cascade');
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
        Schema::dropIfExists('request_an_agents');
    }
}
