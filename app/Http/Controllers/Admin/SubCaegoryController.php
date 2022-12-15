<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class SubCaegoryController extends Controller
{
    public function index()
    {
        $subcategorys = SubCategory::paginate('4');
        $categorys = Category::all();
        return view('admin.subcategory.index',compact('subcategorys','categorys'));
    }
    public function create(Request $request)
    {
        $subcategory = new SubCategory();
        $subcategory->en_name = $request->input('en_name');
        $subcategory->ar_name = $request->input('ar_name');
        $subcategory->category_id = $request->input('category_id');
        $subcategory->slug =  Str::slug($request->en_name);
        $subcategory->staus = $request->input('staus');
        $subcategory->save();
        return response()->json(['message' => 'Subcategory Is  Creatd']);
    }
    public function edit($id)
    {
        $subcategory = SubCategory::findOrfail($id);
        return response()->json(['subcategory' => $subcategory]);
    }
    public function update(Request $request , $id)
    {
        $subcategory = SubCategory::findOrfail($id);
        $subcategory->en_name = $request->input('en_name');
        $subcategory->ar_name = $request->input('ar_name');
        $subcategory->category_id = $request->input('category_id');
        $subcategory->slug =  Str::slug($request->en_name);
        $subcategory->staus = $request->input('staus');
        $subcategory->update();
        return response()->json(['message' => 'Subcategory Is  Updated']);
    }
    public function delete($id)
    {
        $subcategory = SubCategory::findOrfail($id);
        $subcategory->delete();
        return response()->json(['message' => 'Subcategory Is  Deleted']);
    }
}
