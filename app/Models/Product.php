<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['code','name','price','tags','min_order','max_order','description','unit','unit_value','highlight','nutrient','category_id','subCategory_id','add_on','ingredient'];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class,'subCategory_id','id');
    }

    public function photos()
    {
        return $this->hasMany(ProductPhoto::class);
    }


    public function specs()
    {
        return $this->hasMany(ProductSpecification::class);
    }

//    public function getStockAttribute($value)
//    {
//        return $value == 0 ? 'OUT OF STOCK' : $value;
//    }
}
