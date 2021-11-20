<?php

namespace Database\Seeders;
use App\Models\Product;
use App\Models\Categorie;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        // $catA = Categorie::where('name','Category A')->first();

        $products = ['Product 1' => 'Category A',
                     'Product 2'=> 'Category B', 
                     'Product 3'=> 'Subcategory B1',
                     'Product 4'=> 'Subcategory B2',
                     'Product 5'=> 'Subcategory C1',
                    ];

        foreach($products as $key => $value){
        $product = new Product();
        $product->name = $key;
        $product->description = 'Text description of the product';
        $product->price = 125;
        $product->image = 'product_image.jpg';
        $product->save();

        $catA = Categorie::where('name', $value)->first();
        $product->category()->attach($catA);
        }
      
    }
}
