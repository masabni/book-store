<?php

use Illuminate\Database\Seeder;

class PublishersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Publisher::insert([
            'name' => 'Dar Al-Farqad',
        ]);
        \App\Models\Publisher::insert([
            'name' => 'منشورات المتوسط إيطاليا',
        ]);
    }
}
