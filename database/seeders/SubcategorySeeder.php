<?php

namespace Database\Seeders;
use App\Models\Categorie;

use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $catA = Categorie::where('name','Category A')->first();
        $catB = Categorie::where('name','Category B')->first();
        $catC = Categorie::where('name','Category C')->first(); 

        $fstCatName = ['Subcategory A1','Subcategory A2','Subcategory A3'];
        $sndCatName = ['Subcategory B1','Subcategory B2','Subcategory B3'];
        $trdCatName = ['Subcategory C1','Subcategory C2','Subcategory C3'];

        foreach($fstCatName as $name){
            $category = new Categorie();
            $category->name = $name;
            $category->category_id = $catA->id;
            $category->parent_name = $catA->name;
            $category->save();
        }
        foreach($sndCatName as $name){
            $category = new Categorie();
            $category->name = $name;
            $category->category_id = $catB->id;
            $category->parent_name = $catB->name;
            $category->save();
        }
        foreach($trdCatName as $name){
            $category = new Categorie();
            $category->name = $name;
            $category->category_id = $catC->id;
            $category->parent_name = $catC->name;
            $category->save();
        }

    }
}
