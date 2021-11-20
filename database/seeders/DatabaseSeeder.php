<?php

namespace Database\Seeders;

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

        $this->call(CategorieSeeder::class);
        $this->call(SubcategorySeeder::class);
        $this->call(ProductSeeder::class);
        
        // \App\Models\User::factory(10)->create();
        // \App\Models\Categorie::factory(3)
        // ->has(
        //     \App\Models\Categorie::factory()->has(
        //         \App\Models\Product::factory()->count(2), 'products')
        //     ->count(3), 'categories')
        // ->create();
        
    }
}
