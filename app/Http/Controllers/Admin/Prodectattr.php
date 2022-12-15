<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prodectatrbite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
class Prodectattr extends Controller
{
    public function index()
    {
        $prodectattrs = Prodectatrbite::paginate('6');
        return view('admin.prodecattr.index',compact('prodectattrs'));
    }
    public function create(Request $request)
    {
        $prodect = new Prodectatrbite();
        $prodect->prodect_id = $request->input('prodect_id');
        $prodect->color_id = $request->input('color_id');
        $prodect->size_id = $request->input('size_id');
        $prodect->en_name = $request->input('en_name');
        $prodect->ar_name = $request->input('ar_name');
        $prodect->slug = Str::slug($request->en_name);
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $fileExpned = $file->getClientOriginalName();
            $fileName = time().'.'.$fileExpned;
            $file->move('admin_panel/img/',$fileName);
            $prodect->image = $fileName;
        }
        $prodect->save();
        return response()->json(['message' => 'Prodect Atripet Is Created']);
    }
    public function edit($id)
    {
        $prodect = Prodectatrbite::findOrfail($id);
        return response()->json(['prodect' => $prodect]);
    }
    public function update(Request $request , $id)
    {
        $prodect = Prodectatrbite::findOrfail($id);
        $prodect->prodect_id = $request->input('prodect_id');
        $prodect->color_id = $request->input('color_id');
        $prodect->size_id = $request->input('size_id');
        $prodect->en_name = $request->input('en_name');
        $prodect->ar_name = $request->input('ar_name');
        $prodect->slug = Str::slug($request->en_name);
        if($request->hasFile('image'))
        {
            $destmtion ='admin_panel/img/'.$prodect->image;
            if(File::exists($destmtion))
            {
                File::delete($destmtion);
            }
            $file = $request->file('image');
            $fileExpned = $file->getClientOriginalName();
            $fileName = time().'.'.$fileExpned;
            $file->move('admin_panel/img/',$fileName);
            $prodect->image = $fileName;
        }
        $prodect->update();
        return response()->json(['message' => 'Prodect Atripet Is Updated']);
    }
    public function delete($id)
    {
        $prodect = Prodectatrbite::findOrfail($id);
        $destmtiondelete  = 'admin_panel/img/'.$prodect->image;
        if(File::exists($destmtiondelete))
        {
            File::delete($destmtiondelete);
        }
        $prodect->delete();
        return response()->json(['message' => 'Prodect Atripet Is Ddleted']);
    }
}
