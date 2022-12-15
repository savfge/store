<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::paginate('3');
        return view('admin.stock.index',compact('stocks'));
    }
    public function create(Request $request)
    {
        $stock = new Stock();
        $stock->en_name = $request->input('en_name');
        $stock->ar_name = $request->input('ar_name');
        $stock->slug = Str::slug($request->en_name,'-');
        $stock->staus = $request->input('staus');
        $stock->save();
        return response()->json(['message' => 'Stock Is Created']);
    }
    public function edit($id)
    {
        $stock = Stock::findOrfail($id);
        return response()->json(['stock' => $stock]);
    }
    public function update(Request $request , $id)
    {
        $stock = Stock::findOrfail($id);
        $stock->en_name = $request->input('en_name');
        $stock->ar_name = $request->input('ar_name');
        $stock->slug = Str::slug($request->en_name,'-');
        $stock->staus = $request->input('staus');
        $stock->update();
        return response()->json(['message' => 'Stock Is Updated']);
    }
    public function delete($id)
    {
        $stock = Stock::findOrfail($id);
        $stock->delete();
        return response()->json(['message' => 'Stock Is Updated']);
    }
}
