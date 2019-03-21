<?php

use Illuminate\Database\Seeder;

class SubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SubCategory::insert([
            'name' => 'أدب عالمي',
            'category_id' => 1,
        ]);
        \App\Models\SubCategory::insert([
            'name' => 'الخط العربي',
            'category_id' => 2,
        ]);
    }
}
