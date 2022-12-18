<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SubCategoryController extends Controller
{
    public function create(Request $request)
    {
        $subCategories = SubCategory::when(isset($request->keyword), function ($q) use ($request) {
            return $q->where('name', 'LIKE', "%$request->keyword%");
        })->get();
        return view('Dashboard.SubCategory.create', compact('subCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $ar = array_merge($request->only(['name', 'category_id']), ['created_at' => now(), 'updated_at' => now()]);
        DB::table('sub_categories')->insert($ar);

        return redirect()->back()->with('message', ['icon' => 'success', 'text' => $request->name . ' brand successfully created!']);

    }

    public function update(Request $request, SubCategory $subCategory)
    {

        $ar = array_merge($request->only(['name', 'category_id']), ['updated_at' => now()]);

        DB::table('sub_categories')->where('id', $subCategory->id)->update($ar);

        return redirect()->back()->with('message', ['icon' => 'success', 'text' => $request->name . ' brand successfully updated!']);
    }


    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();
        return redirect()->back()->with('message', ['icon' => 'success', 'text' => 'successfully ' . $subCategory->name . ' category deleted!']);
    }
}
