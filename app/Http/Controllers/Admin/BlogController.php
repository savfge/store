<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate('5');
        return view('admin.blog.index',compact('blogs'));
    }
    public function create(Request $request)
    {
        if($request->hasFile('image'))
        {
            foreach($request->image as $blog)
            {
                $blogNameimage = $blog->getClientOriginalName();
                $blogExpnsee = $blog->getClientOriginalExtension();
                $blogNew = uniqid('',true).$blogExpnsee;
                $blog->move('admin_panel/img/',$blogNew);
                $blog = new Blog();
                $blog->image = $blogNew;
                $blog->name = $request->input('name');
                $blog->short_desc = $request->input('short_desc');
                $blog->long_desc = $request->input('long_desc');
                $blog->slug = Str::slug($request->name,'-');
                $blog->save();
            }
        }
        return response()->json(['message' => 'Blog Is  Created']);
    }
    public function edit($id)
    {
        $blog = Blog::findOrfail($id);
        return response()->json(['blog' => $blog]);
    }
    public function update(Request $request , $id)
    {
        $blog = Blog::findOrfail($id);      
        $blog->name = $request->input('name');
        $blog->short_desc = $request->input('short_desc');
        $blog->long_desc = $request->input('long_desc');
        $blog->slug = Str::slug($request->name,'-');
        if($request->hasFile('image'))
        {
            $destmtion = 'admin_panel/img/'.$blog->image;
            if(File::exists($destmtion))
            {
                File::delete($destmtion);
            }
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $fileExpke = time().'.'.$fileName;
            $file->move('admin_panel/img/',$fileExpke);
            $blog->image = $fileExpke;
        }
        $blog->update();
        return response()->json(['message' => 'Blog Is  Updated']);
    }
    public function delete($id)
    {
        $blog = Blog::findOrfail($id);
        $destmtiondelete="admin_panel/img/".$blog->image;
        if(File::exists($destmtiondelete))
        {
            File::delete($destmtiondelete);
        }
        $blog->delete();
        return response()->json(['message' => 'Blog Is  Deleted']);
    }
} 
