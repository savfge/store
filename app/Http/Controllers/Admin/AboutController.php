<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::paginate('4');
        return view('admin.aabout.index',compact('abouts'));
    }
    public function create(Request $request)
    {
        if($request
        ->hasFile('image'))
        {
           foreach($request->image as $about)
           {
             $aaboutName = $about->getClientOriginalName();
             $aboutExplede = $about->getClientOriginalExtension();
             $fileNew = uniqid('',true).$aboutExplede;
             $about->move('admin_panel/img/',$fileNew);
             $about = new About();
             $about->image = $fileNew;
             $about->title = $request->input('title');
             $about->desc = $request->input('desc');
             $about->staus = $request->input('staus');
             $about->name = $request->input('name');
             $about->save();
           }
        }
        return response()->json(['message' => 'About Is Created']);
    }
    public function edit($id)
    {
        $about = About::findOrfail($id);
        return response()->json(['about' => $about]);
    }
    public function update(Request $request , $id)
    {
        $about = About::findOrFail($id);
        $about->title = $request->input('title');
        $about->desc = $request->input('desc');
        $about->staus = $request->input('staus');
        $about->name = $request->input('name');
        if($request->hasFile('image'))
        {
            $destmtion = 'admin_panel/img/'.$about->image;
            if(File::exists($destmtion))
            {
                File::delete($destmtion);
            }
            $file = $request->file('image');
            $fileEcde = $file->getClientOriginalName();
            $fileName = time().'.'.$fileEcde;
            $file->move('admin_panel/img/',$fileName);
            $about->image = $fileName;
        }
        $about->update();
        return response()->json(['message' => 'About Is Updated']);
    }
    public function delete($id)
    {
        $about = About::findOrFail($id);
        $destmtiondelet = 'admin_panel/img/'.$about->image;
        if(File::exists($destmtiondelet))
        {
            File::delete($destmtiondelet);
        }
        $about->delete();
        return response()->json(['message' => 'About Is Deleted']);
    }
    public function aboutser($id)
    {
        $about = About::findOrFail($id);
        $about->staus = 2;
        $about->save();
        return redirect()->back();
    }
    public function aboutdes($id)
    {
        $about = About::findOrFail($id);
        $about->staus = 1;
        $about->save();
        return redirect()->back();

    }
}