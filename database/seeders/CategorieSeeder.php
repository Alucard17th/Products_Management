<?php

namespace Database\Seeders;
use App\Models\Categorie;

use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Categorie();
        $category->name = 'Category A';
        $category->save();

        $category = new Categorie();
        $category->name = 'Category B';
        $category->save();

        $category = new Categorie();
        $category->name = 'Category C';
        $category->save();
    }
}
