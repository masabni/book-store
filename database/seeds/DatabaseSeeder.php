<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             AuthorRolesTableSeeder::class,
             AuthorsTableSeeder::class,
             CategoriesTableSeeder::class,
             CoverTypesTableSeeder::class,
             ProductSizesTableSeeder::class,
             ProductTypesTableSeeder::class,
             PublisherRolesTableSeeder::class,
             PublishersTableSeeder::class,
             SubCategoriesTableSeeder::class,
         ]);
    }
}
