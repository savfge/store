<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
class ProdectController extends Controller
{
    public function index()
    {
        $prodects = Product::paginate('100');
        return view('admin.prodect.index',compact('prodects'));
    }
    public function create(Request $request)
    {
        $prodect = new Product();
        $prodect->en_name = $request->input('en_name');
        $prodect->ar_name = $request->input('ar_name');
        $prodect->short_desc = $request->input('short_desc');
        $prodect->long_desc = $request->input('long_desc');
        $prodect->old_price = $request->input('old_price');
        $prodect->new_price = $request->input('new_price');
        $prodect->staus = $request->input('staus');
        $prodect->new = $request->input('new');
        $prodect->category_id = $request->input('category_id');
        $prodect->subcategory_id = $request->input('subcategory_id');
        $prodect->color_id = $request->input('color_id');
        $prodect->size_id = $request->input('size_id');
        $prodect->stock_id = $request->input('stock_id');
        $prodect->slug =Str::slug($request->en_name);
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $fileExpde = $file->getClientOriginalName();
            $fileName = time().'.'.$fileExpde;
            $file->move('admin_panel/img/',$fileName);
            $prodect->image = $fileName;
        }
        $prodect->save();
        return response()->json(['message' => 'Prodect Is Created']);
    }
    public function edit($id)
    {
        $prodect = Product::findOrfail($id);
        return response()->json(['prodect' => $prodect]);
    }
    public function update(Request $request  , $id)
    {
        $prodect =  Product::findOrfail($id);
        $prodect->en_name = $request->input('en_name');
        $prodect->ar_name = $request->input('ar_name');
        $prodect->short_desc = $request->input('short_desc');
        $prodect->long_desc = $request->input('long_desc');
        $prodect->old_price = $request->input('old_price');
        $prodect->new_price = $request->input('new_price');
        $prodect->staus = $request->input('staus');
        $prodect->new = $request->input('new');
        $prodect->category_id = $request->input('category_id');
        $prodect->subcategory_id = $request->input('subcategory_id');
        $prodect->color_id = $request->input('color_id');
        $prodect->size_id = $request->input('size_id');
        $prodect->stock_id = $request->input('stock_id');
        $prodect->slug =Str::slug($request->en_name);
        if($request->hasFile('image'))
        {
            $destmtion = 'admin_panel/img/'.$prodect->image;
            if(File::exists($destmtion))
            {
                File::delete($destmtion);
            }
            $file = $request->file('image');
            $fileExpde = $file->getClientOriginalName();
            $fileName = time().'.'.$fileExpde;
            $file->move('admin_panel/img/',$fileName);
            $prodect->image = $fileName;
        }
        $prodect->update();
        return response()->json(['message' => 'Prodect Is Created']);
    }
    public function delete($id)
    {
        $prodect = Product::findOrfail($id);
        $destmtiondelete='admin_panel/img/'.$prodect->image;
        if(File::exists($destmtiondelete))
        {
            File::delete($destmtiondelete);
        }
        $prodect->delete();
        return response()->json(['message' => 'Prodect Is Deleted']);
    }
}
