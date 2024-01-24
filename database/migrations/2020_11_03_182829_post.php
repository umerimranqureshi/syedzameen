<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Post extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('property_title');
            $table->string('description')->nullable();
            $table->bigInteger('price');
            $table->bigInteger('land_area');
            $table->string('bedrooms')->nullable();
            $table->string('bathrooms')->nullable();


            $table->bigInteger('city_area_id')->nullable();
            $table->string('location')->nullable();
            $table->string('address');
            $table->string('contact_person_name');
            $table->string('mobile_number');
            $table->string('mobile2_number')->nullable();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('sold')->nullable();
            $table->string('admin_post')->nullable();
            $table->enum('post_boaster', ['normal', 'hot', 'superhot']);
            $table->string('video_link')->nullable();
            $table->string('amenities')->nullable();
            $table->string('year')->nullable();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');


            $table->string('property_categorie_id');

            $table->string('disable')->nullable();

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

        Schema::dropIfExists('post_image');
        Schema::dropIfExists('post_views');

        Schema::dropIfExists('request_an_agents');
        Schema::dropIfExists('user_post_reqs');

        Schema::dropIfExists('add_to_favorites');
        Schema::dropIfExists('posts');


    }
}
