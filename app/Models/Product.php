<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'description', 'image', 'category_id'];
    // protected $primaryKey = 'ID';

    public function category()
    {
        return $this->belongsToMany('App\Models\Categorie', 'products_categories', 'product_id', 'category_id');
    }
}
