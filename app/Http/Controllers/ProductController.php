<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categorie;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::with('category')->get();
        
        return $products;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $imageName = '';

        if($request->file('image')){
            // $name = time().'.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
            // \Image::make($request->image)->save(public_path('img/product/').$name);
            // $request->merge(['image' => $name]);
            $imgpath = public_path('images');
            $fileName = $request->file('image')->getClientOriginalName();
            $newName = time() . '_'.$fileName.'.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move($imgpath, $newName);
            $imageName = $fileName;

        } 

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        $category = Categorie::where('id',$request->category)->get();

        foreach ($request->category as $category) {
            $category = Categorie::where('id', $category)->get();
            $product->category()->attach($category);
        };

        return $product;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
