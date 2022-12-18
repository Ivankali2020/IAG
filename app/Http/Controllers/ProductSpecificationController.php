<?php

namespace App\Http\Controllers;

use App\Models\ProductSpecification;
use Illuminate\Http\Request;

class ProductSpecificationController extends Controller
{
    public function delete($id){
        $product = ProductSpecification::where('id',$id)->first();
        $product->delete();
        return response()->json(['data'=>true]);
    }
}
