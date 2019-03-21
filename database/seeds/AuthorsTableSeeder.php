<?php

use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Author::insert([
            'name' => 'أحمد الدمنهوري',
        ]);

        \App\Models\Author::insert([
            'name' => 'علي إبراهيم اشقر',
        ]);
    }
}
