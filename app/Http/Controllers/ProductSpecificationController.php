<?php

namespace App\Http\Controllers;

use App\Models\ProductSpecification;
use Illuminate\Http\Request;

class ProductSpecificationController extends Controller
{
    public function delete($id){
        $product = ProductSpecification::where('id',$id)->first();

        if(!$product){
            return redirect()->back()->with('message',['icon' => 'success', 'text' => 'Spec Not found']);
        }
        $product->delete();
        return redirect()->back()->with('message',['icon' => 'success', 'text' => ' successfully deleted!']);

    }
}
