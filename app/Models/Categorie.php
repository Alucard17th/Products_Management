<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = ['name','category_id', 'parent_name'];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'products_categories', 'category_id', 'product_id');
    }

    public function categories()
    {
        return $this->hasMany(Categorie::class,'category_id');
    }

    public function subCategories()
    {
        return $this->hasMany(Categorie::class, 'category_id')->with('categories');
    }

}
