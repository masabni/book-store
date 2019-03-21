<?php

use Illuminate\Database\Seeder;

class CoverTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\CoverType::insert([
            'type' => 'Normal',
        ]);
        \App\Models\CoverType::insert([
            'type' => 'Art',
        ]);
    }
}
