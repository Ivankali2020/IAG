<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = Category::when(isset($request->keyword),function ($q) use ($request){
            return $q->where('name','LIKE',"%$request->keyword%");
        })->get();
        return  view('Dashboard.Category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required',
        ]);

        $ar = array_merge($request->only('name'),['created_at'=>now(),'updated_at'=>now()]);
        DB::table('categories')->insert($ar);

        return redirect()->back()->with('message',['icon'=>'success','text'=>'successfully '.$request->name.' category created!']);

    }

    public function update(Request $request, Category $category)
    {

       $ar = array_merge($request->only('name'),['updated_at'=>now()]);

        DB::table('categories')->where('id',$category->id)->update($ar);

        return redirect()->back()->with('message',['icon'=>'success','text'=>'successfully '.$request->name.' category updated!']);

    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('message',['icon'=>'success','text'=>'successfully '.$category->name.' category deleted!']);
    }
}
