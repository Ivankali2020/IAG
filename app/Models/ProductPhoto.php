<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
    use HasFactory;

    public function getNameAttribute($value)
    {
        if($value == null){
            $photo = asset('assets/images/products/img-'.random_int(1,10).'.png');
        }else{
            $photo = asset('storage/product_photo/'.$value);
        }
        return $photo;
    }
}
