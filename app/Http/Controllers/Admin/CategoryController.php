<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    public function index()
    {
        $categorys = Category::paginate('3');
        return view('admin.category.index',compact('categorys'));
    }
    public function create(Request $request)
    {
        $category = new Category();
        $category->en_name = $request->input('en_name');
        $category->ar_name = $request->input('ar_name');
        $category->slug = Str::slug($request->en_name,'-');
        $category->staus = $request->input('staus');
        $category->save();
        return response()->json(['message' => 'Category Is Created']);
    }
    public function edit($id)
    {
        $category = Category::findOrfail($id);
        return response()->json(['category'=>$category]);
    }
    public function update(Request $request , $id)
    {
        $category = Category::findOrfail($id);
        $category->en_name = $request->input('en_name');
        $category->ar_name = $request->input('ar_name');
        $category->slug = Str::slug($request->en_name,'-');
        $category->staus = $request->input('staus');
        $category->update();
        return response()->json(['message' => 'Category Is Updated']);
    }
    public function delete($id)
    {
        $category = Category::findOrfail($id);
        $category->delete();
        return response()->json(['message' => 'Category Is Deleted']);
    }
}
