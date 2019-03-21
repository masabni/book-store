<?php

use Illuminate\Database\Seeder;

class PublisherRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\PublisherRole::insert([
            'role' => 'Distributor',
        ]);
        \App\Models\PublisherRole::insert([
            'role' => 'Publisher',
        ]);
    }
}
