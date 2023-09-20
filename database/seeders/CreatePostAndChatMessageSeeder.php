<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\ChatMessage;


class CreatePostAndChatMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Post::factory()->count(20)->create();
        ChatMessage::factory()->count(20)->create();
    }
}
