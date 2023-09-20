<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Role::insert([
            [
                'id'=>1,
                'name'=>'admin'
            ],
            [
                'id'=>2,
                'name'=>'buyer'
            ],
            [
                'id'=>3,
                'name'=>'seller'
            ]
        
            ]);
    }
}
