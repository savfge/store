<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DashboardContoller;
use App\Http\Controllers\Admin\izeController;
use App\Http\Controllers\Admin\Prodectattr;
use App\Http\Controllers\Admin\ProdectController;
use App\Http\Controllers\Admin\SilderController;
use App\Http\Controllers\Admin\StockController;
use App\Http\Controllers\Admin\SubCaegoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth','Isadmin')->prefix('admin')->group(function(){
Route::get('/',[DashboardContoller::class,'index'])->name('index');
Route::get('/category',[CategoryController::class,'index'])->name('category.index');
Route::post('/categorystore',[CategoryController::class,'create']);
Route::get('/categoryedit/{id}',[CategoryController::class,'edit']);
Route::post('/categoryupdate/{id}',[CategoryController::class,'update']);
Route::get('/categorydelete/{id}',[CategoryController::class,'delete']);
// End CategoryControlelr
Route::get('/stock',[StockController::class,'index'])->name('stock.index');
Route::post('/stockstore',[StockController::class,'create']);
Route::get('/stockedit/{id}',[StockController::class,'edit']);
Route::post('/stockupdate/{id}',[StockController::class,'update']);
Route::get('/stockdelete/{id}',[StockController::class,'delete']);
// End StockControlelr
Route::get('/size',[izeController::class,'index'])->name('size.index');
Route::post('/sizestore',[izeController::class,'create']);
Route::get('/sizeedit/{id}',[izeController::class,'edit']);
Route::post('/sizeupdate/{id}',[izeController::class,'update']);
Route::get('/sizedelete/{id}',[izeController::class,'delete']);
// End SizeContorller 
Route::get('/color',[ColorController::class,'index'])->name('color.index');
Route::post('/colorstore',[ColorController::class,'create']);
Route::get('/coloredit/{id}',[ColorController::class,'edit']);
Route::post('/colorupdate/{id}',[ColorController::class,'update']);
Route::get('/colordelete/{id}',[ColorController::class,'delete']);
// End ColorContorller
Route::get('/subcategory',[SubCaegoryController::class,'index'])->name('subcategory.index');
Route::post('/subcategorystore',[SubCaegoryController::class,'create']);
Route::get('/subcategoryedit/{id}',[SubCaegoryController::class,'edit']);
Route::post('/subcategoryupdate/{id}',[SubCaegoryController::class,'update']);
Route::get('/subcategorydelete/{id}',[SubCaegoryController::class,'delete']);
// End SubcategoryController
Route::get('/silder',[SilderController::class,'index'])->name('silder.index');
Route::post('/silderstore',[SilderController::class,'create']);
Route::get('/silderedit/{id}',[SilderController::class,'edit']);
Route::post('/silderupdate/{id}',[SilderController::class,'update']);
Route::get('/silderdelete/{id}',[SilderController::class,'delete']);
// End SilderController
Route::get('/prodect',[ProdectController::class,'index'])->name('prodect.index');
Route::post('/prodectstore',[ProdectController::class,'create']);
Route::get('/prodectedit/{id}',[ProdectController::class,'edit']);
Route::post('/prodectupdate/{id}',[ProdectController::class,'update']);
Route::get('/prodectdelete/{id}',[ProdectController::class,'delete']);
// End PRodectControlelr
Route::get('/blog',[BlogController::class,'index'])->name('blog.index');
Route::post('blogtstore',[BlogController::class,'create']);
Route::get('/blogedit/{id}',[BlogController::class,'edit']);
Route::post('/blogupdate/{id}',[BlogController::class,'update']);
Route::get('/blogdelete/{id}',[BlogController::class,'delete']);
// End BlogController
Route::get('/prodectatrr',[Prodectattr::class,'index'])->name('prodectatrr.index');
Route::post('prodectatrrtstore',[Prodectattr::class,'create']);
Route::get('/prodectatrredit/{id}',[Prodectattr::class,'edit']);
Route::post('/prodectatrrupdate/{id}',[Prodectattr::class,'update']);
Route::get('/prodectatrrdelete/{id}',[Prodectattr::class,'delete']);
// End ProdectController
Route::get('/about',[AboutController::class,'index'])->name('about.index');
Route::post('aboutatrrtstore',[AboutController::class,'create']);
Route::get('/aboutatrredit/{id}',[AboutController::class,'edit']);
Route::post('/aboutatrrupdate/{id}',[AboutController::class,'update']);
Route::get('/aboutatrrdelete/{id}',[AboutController::class,'delete']);

Route::post('/editstausunp/{id}',[AboutController::class,'aboutser'])->name('aboutser');
Route::post('/aboutdess/{id}',[AboutController::class,'aboutdes'])->name('aboutdes');
});