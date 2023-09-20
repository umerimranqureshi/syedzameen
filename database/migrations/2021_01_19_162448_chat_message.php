<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChatMessage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("sender_id");
            $table->unsignedBigInteger("reciver_id");
            $table->string("message");
            $table->enum("replied", ['yes', "no"])->default("no");
            $table->enum("sender_status", ["active", "deleted"])->default("active");
            $table->enum("reciver_status", ["unseen", "seen", "deleted"])->default("unseen");

            $table->timestamps();



            $table->foreign('sender_id')
                ->references('id')
                ->on('users');
            $table->foreign('reciver_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
