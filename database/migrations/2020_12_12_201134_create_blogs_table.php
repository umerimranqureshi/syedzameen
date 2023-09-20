<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {

            $table->id();
            $table->string("title");
            $table->string("content", 6000);
            $table->string("header", 150);
            $table->string("tags")->nullable();
            // $table->unsignedBigInteger("user_id");
            $table->timestamps();

            $table->foreignId('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("blog_images");
        Schema::dropIfExists('blogs');
    }
}
