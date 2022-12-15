<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Silder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SilderController extends Controller
{
    public function index()
    {
        $silders  = Silder::paginate('4');
        return view('admin.silder.index',compact('silders'));
    }
    public function create(Request $request)
    {
        if($request->hasFile('image'))
        {
            foreach($request->image as $silder)
            {
                $silderName = $silder->getClientOriginalName();
                $silderExpde = $silder->getClientOriginalExtension();
                $silderNew = uniqid("",true).$silderExpde;
                $silder->move('admin_panel/img/',$silderNew);
                $silder = new Silder();
                $silder->en_name = $request->input('en_name');
                $silder->ar_name = $request->input('ar_name');
                $silder->staus = $request->input('staus');
                $silder->image = $silderNew;
                $silder->en_desc = $request->input('en_desc');
                $silder->ar_desc = $request->input('ar_desc');
                $silder->save();
            }
        }
        return response()->json(['message' => 'Created New Silder Successed']);
    }
    public function edit($id)
    {
        $silder = Silder::findOrfail($id);
        return response()->json(['silder' => $silder]);
    }
    public function update(Request $request , $id)
    {
        $silder =  Silder::findOrfail($id);
        if($request->hasFile('image'))
        {
            $destmtion = 'admin_panel/img/'.$silder->image;
            if(File::exists($destmtion))
            {
                File::delete($destmtion);
            }
            $file = $request->file('image');
            $fileExpnasw = $file->getClientOriginalName();
            $fileNaame = time().'.'.$fileExpnasw;
            $file->move('admin_panel/img/',$fileNaame );
            $silder->image = $fileNaame;
        }
        $silder->en_name = $request->input('en_name');
        $silder->ar_name = $request->input('ar_name');
        $silder->staus = $request->input('staus');
        $silder->en_desc = $request->input('en_desc');
        $silder->ar_desc = $request->input('ar_desc');
        $silder->update();
        return response()->json(['message' => 'Silder Is Updated']);
    }
    public function delete($id)
    {
        $silder = Silder::findOrfail($id);
        $destmtiondelete = 'admin_panel/img/'.$silder->image;
        if(File::exists($destmtiondelete))
        {
            File::delete($destmtiondelete);
        }
        $silder->delete();
        return response()->json(['message' => 'Silder Is Deleted']);
    }
}