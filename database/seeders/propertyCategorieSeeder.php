<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use PropertyCategorie;

class propertyCategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table("property_categories")->insert([
            [
                "id" => 1,
                "purpose" => "sale",
                "property_type" => "residential",
                "property_sub_type" => "home",
                "created_at" => null,
                "updated_at" => null,
            ],
            [
                "id" => 2,
                "purpose" => "sale",
                "property_type" => "residential",
                "property_sub_type" => "residential_plot",
                "created_at" => null,
                "updated_at" => null,
            ],


            [
                "id" => 3,
                "purpose" => "sale",
                "property_type" => "residential",
                "property_sub_type" => "upper_portion",
                "created_at" => null,
                "updated_at" => null,
            ],


            [
                "id" => 4,
                "purpose" => "sale",
                "property_type" => "residential",
                "property_sub_type" => "lower_portion",
                "created_at" => null,
                "updated_at" => null,
            ],


            [
                "id" => 5,
                "purpose" => "sale",
                "property_type" => "residential",
                "property_sub_type" => "flat",
                "created_at" => null,
                "updated_at" => null,
            ],



            [
                "id" => 6,
                "purpose" => "sale",
                "property_type" => "commercial",
                "property_sub_type" => "office",
                "created_at" => null,
                "updated_at" => null,
            ],
            [
                "id" => 7,
                "purpose" => "sale",
                "property_type" => "commercial",
                "property_sub_type" => "shop",
                "created_at" => null,
                "updated_at" => null,
            ],
            [
                "id" => 8,
                "purpose" => "sale",
                "property_type" => "commercial",
                "property_sub_type" => "building",
                "created_at" => null,
                "updated_at" => null,
            ],
            [
                "id" => 9,
                "purpose" => "sale",
                "property_type" => "commercial",
                "property_sub_type" => "commercial_plot",
                "created_at" => null,
                "updated_at" => null,
            ],
            [
                "id" => 10,
                "purpose" => "rent",
                "property_type" => "residential",
                "property_sub_type" => "home",
                "created_at" => null,
                "updated_at" => null,
            ],
            [
                "id" => 11,
                "purpose" => "rent",
                "property_type" => "residential",
                "property_sub_type" => "flat",
                "created_at" => null,
                "updated_at" => null,
            ],
            [
                "id" => 12,
                "purpose" => "rent",
                "property_type" => "residential",
                "property_sub_type" => "upper portion",
                "created_at" => null,
                "updated_at" => null,
            ],
            [
                "id" => 13,
                "purpose" => "rent",
                "property_type" => "residential",
                "property_sub_type" => "lower portion",
                "created_at" => null,
                "updated_at" => null,
            ],
            [
                "id" => 14,
                "purpose" => "rent",
                "property_type" => "residential",
                "property_sub_type" => "residential_plot",
                "created_at" => null,
                "updated_at" => null,
            ],
            [
                "id" => 15,
                "purpose" => "rent",
                "property_type" => "commercial",
                "property_sub_type" => "office",
                "created_at" => null,
                "updated_at" => null,
            ],
            [
                "id" => 16,
                "purpose" => "rent",
                "property_type" => "commercial",
                "property_sub_type" => "shop",
                "created_at" => null,
                "updated_at" => null,
            ],
            [
                "id" => 17,
                "purpose" => "rent",
                "property_type" => "commercial",
                "property_sub_type" => "building",
                "created_at" => null,
                "updated_at" => null,
            ],
            [
                "id" => 18,
                "purpose" => "rent",
                "property_type" => "commercial",
                "property_sub_type" => "commercial_plot",
                "created_at" => null,
                "updated_at" => null,
            ],
           


        ]);
    }
}
