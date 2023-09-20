<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\cityAndArea;
use Database\Seeders\propertyCategorieSeeder;
use Database\Seeders\roles;
use Database\Seeders\UserSeeder;
use Database\Seeders\CreatePostAndChatMessageSeeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([

            UserSeeder::class,
            cityAndArea::class,
            propertyCategorieSeeder::class,
            roles::class,
            //CreatePostAndChatMessageSeeder::class,

        ]);


        // \App\Models\User::factory(10)->create();
    }
}
