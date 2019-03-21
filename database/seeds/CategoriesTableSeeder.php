<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::insert([
            'name' => 'أدب',
        ]);
        \App\Models\Category::insert([
            'name' => 'فنون',
        ]);
    }
}
