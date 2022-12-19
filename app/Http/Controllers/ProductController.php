<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductPhoto;
use App\Models\ProductSpecification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::when(isset($request->keyword),function ($q) use ($request){
            return $q
                ->orWhere('name','LIKE',"%$request->keyword%")->orWhere('size','LIKE',"%$request->keyword%")
                ->orWhereHas('Category',function ($c) use ($request){
                    return $c->where('name','LIKE',"%$request->keyword%");
                })
                ->orWhereHas('subCategory',function ($b) use ($request){
                    return $b->where('name','LIKE',"%$request->keyword%");
                });
        })->when(isset($request->status),function ($e){
            return $e->where('stock',0);
        })->with(['Category','subCategory'])->latest()->paginate(20);

        return  view('Dashboard.Product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.Product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->except(['images','_token','proengsoft_jsvalidation','stitle','sdescription']);

        try {

             DB::table('products')->insert(array_merge($data,['created_at' => now() , 'updated_at' => now()]));


            $product = Product::where('code',$request->code)->first();

            if($request->hasFile('images')){
                $images = $request->file('images');
                $path = '/public/product_photo/';
                if(!Storage::exists($path)){
                    Storage::makeDirectory($path);
                }
                foreach ($images as $img) {
                    $newName  = uniqid().now().$img->getClientOriginalName();
                    Storage::putFileAs($path,$img,$newName);

                    $productPhoto = new ProductPhoto();
                    $productPhoto->name = $newName;
                    $productPhoto->product_id = $product->id;
                    $productPhoto->save();
                }
            }

            $specifications = [];
            foreach ($request->stitle as $key=>$item) {
                if ($item != null){
                    $specifications[] = [
                        'product_id' => $product->id,
                        'title' =>  $item,
                        'description' => $request->sdescription[$key] ?? '',
                    ];
                }
            }
            if(count($specifications) > 0){
                ProductSpecification::insert($specifications);
            }
            DB::commit();
            return redirect()->route('home')->with('message',['icon' => 'success', 'text' => $product->name . 'is successfully created!']);


        }catch (Exception $err){
            DB::rollBack();
            return redirect()->back()->with('message',['icon' => 'error', 'text' => $err->getMessage()]);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('Dashboard.Product.detail')->with(['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('Dashboard.Product.edit')->with(['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->except(['images','_token',"_method",'proengsoft_jsvalidation','stitle','sdescription']);

        try {

            DB::table('products')->where('id',$product->id)->update(array_merge($data,['updated_at' => now()]));


            if($request->hasFile('images')){
                $images = $request->file('images');
                $path = '/public/product_photo/';
                if(!Storage::exists($path)){
                    Storage::makeDirectory($path);
                }
                $imgs = [];
                foreach ($images as $img) {
                    $newName  = uniqid().now().$img->getClientOriginalName();
                    Storage::putFileAs($path,$img,$newName);
                    $imgs[] = [
                        'name' => $newName,
                        'product_id' => $product->id
                    ];
                }
                ProductPhoto::insert($imgs);
            }

            if(isset($request->stitle)){
                ProductSpecification::get()->each->delete();

                $specifications = [];
                foreach ($request->stitle as $key=>$item) {
                    if ($item != null){
                        $specifications[] = [
                            'product_id' => $product->id,
                            'title' =>  $item,
                            'description' => $request->sdescription[$key] ?? '',
                        ];
                    }
                }
                ProductSpecification::insert($specifications);

            }

            DB::commit();
            return redirect()->route('home')->with('message',['icon' => 'success', 'text' => $product->name . 'is successfully updated!']);


        }catch (Exception $err){
            DB::rollBack();
            return redirect()->back()->with('message',['icon' => 'error', 'text' => $err->getMessage()]);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $path = '/public/product_photo/';
        foreach ($product->Photos as $p){
            Storage::delete($path.$p->name);
        }
        $product->delete();
        return redirect()->back()->with('message',['icon' => 'success', 'text' => "$product->name is Successfully Deleted!"]);

    }

    public function deletePhoto($id){

        $photo = ProductPhoto::where('id',$id)->first();

        $photo->delete();

        return redirect()->back()->with('message',['icon' => 'success', 'text' => "Successfully Delete!"]);

    }

    public function publish($id)
    {
        $product = Product::where('id',$id)->first();

        $product->is_publish = $product->is_publish == '1' ? '0' : '1';
        $product->update();

        return redirect()->route('home')->with('message',['icon' => 'success', 'text' => "Successfully Publish!"]);
//        return response()->json(['data'=>true,'status' => $product->is_publish]);
    }

}
