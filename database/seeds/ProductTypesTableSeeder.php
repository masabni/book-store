<?php

use Illuminate\Database\Seeder;

class ProductTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ProductType::insert([
            'type' => 'Book',
        ]);
        \App\Models\ProductType::insert([
            'type' => 'CD',
        ]);
        \App\Models\ProductType::insert([
            'type' => 'DVD',
        ]);
        \App\Models\ProductType::insert([
            'type' => 'Magazine',
        ]);
    }
}
