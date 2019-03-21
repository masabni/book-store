<?php

use Illuminate\Database\Seeder;

class ProductSizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ProductSize::insert([
            'size' => '17x12 cm',
        ]);
        \App\Models\ProductSize::insert([
            'size' => '17x15 cm',
        ]);
        \App\Models\ProductSize::insert([
            'size' => '19x13 cm',
        ]);
        \App\Models\ProductSize::insert([
            'size' => '20x14 cm',
        ]);
        \App\Models\ProductSize::insert([
            'size' => '20x27 cm',
        ]);
        \App\Models\ProductSize::insert([
            'size' => '21x14 cm',
        ]);
    }
}
