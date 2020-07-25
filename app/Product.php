<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getCurrentProductCategory($product)
    {
        $category = Category::where('id', $product->category_id)->first();
        return $name = $category->name;

    }

    public function getPriceForCount()
    {
        if(!is_null($this->pivot)){
            return $this->pivot->count * $this->price;
        }
       return $this->price;
    }
}
