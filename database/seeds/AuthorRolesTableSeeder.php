<?php

use Illuminate\Database\Seeder;

class AuthorRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AuthorRole::insert([
            'role' => 'Author',
        ]);
        \App\Models\AuthorRole::insert([
            'role' => 'Co-Writer',
        ]);
        \App\Models\AuthorRole::insert([
            'role' => 'Ghost-Writer',
        ]);
        \App\Models\AuthorRole::insert([
            'role' => 'Translator',
        ]);
        \App\Models\AuthorRole::insert([
            'role' => 'Illustrator',
        ]);
    }
}
