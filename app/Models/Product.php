<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'user_id',
        'image',
        'name',
        'description',
        'price',
    ];
    public function product_category()
    {
        return $this->hasMany(ProductCategory::class);
    }
    // public  function getproduct_categoryList()
    // {
    //     $list = $this->product_category()->get();
    //     $array = [];
    //     foreach ($list as $key => $value) {
    //         $array[]['name'] = $value->category->name;
    //     }
        
    //     return $array;
    // }
    //Attribute
    public function getImageAttribute($value)
    {
        if ($value) {
            return asset('uploads/products/'.$value);
        } else {
            return asset('admin\images\default\avatar.jpg');
        }
    }
    
}
