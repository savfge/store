<?php

use App\Http\Controllers\Frontend\FrontendController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth')->group(function(){
Route::get('/',[FrontendController::class,'index'])->name('home');
Route::get('/shop',[FrontendController::class,'shop'])->name('shop');
Route::get('/sort_by',[FrontendController::class,'shops']);
Route::get('/category/{id}',[FrontendController::class,'category']);
Route::get('/stock/{id}',[FrontendController::class,'stock']);
Route::get('/color/{id}',[FrontendController::class,'color']);
Route::get('/size/{id}',[FrontendController::class,'size']);
Route::get('/subcategory/{id}',[FrontendController::class,'subcategory']);
Route::get('/prodectdatils/{id}',[FrontendController::class,'prodectdatils'])->name('prodectdatils');
Route::post('/cartstores',[FrontendController::class,'cartstore']);
Route::get('/cart',[FrontendController::class,'cart'])->name('cart');
Route::get('/cartupdates',[FrontendController::class,'cartupdate']);
Route::get('/clearall',[FrontendController::class,'clearall']);
Route::get('/delete/{rowId}',[FrontendController::class,'delete']);
Route::post('/wishlisstores/{id}',[FrontendController::class,'wishlisstore']);
Route::get('/wishlist',[FrontendController::class,'wishlist'])->name('wishlist');
Route::get('/checkout',[FrontendController::class,'checkout'])->name('checkout');
Route::post('/carts/{id}',[FrontendController::class,'carts']);
Route::get('/blog',[FrontendController::class,'blog'])->name('blog');
Route::get('/blogs/{id}',[FrontendController::class,'blogs'])->name('blogs');
Route::get('/showblogcates/{id}',[FrontendController::class,'showblogcate']);
Route::get('/subcategoryshows/{id}',[FrontendController::class,'subcategoryshow']);
Route::post('/reviewstores',[FrontendController::class,'reviewstore']);
Route::get('/stripe',[FrontendController::class,'stripe'])->name('stripe');
Route::post('/stripepaymentstores',[FrontendController::class,'stripepaymentstore'])->name('stripepaymentstore');
Route::get('/checkouts',[FrontendController::class,'checkouts'])->name('checkouts');
Route::post('/checkoutstrore',[FrontendController::class,'checkoutstrore'])->name('checkoutstrore');
Route::post('/search',[FrontendController::class,'search'])->name('search');
Route::get('/about',[FrontendController::class,'about'])->name('about');
Route::post('/searchshop',[FrontendController::class,'searchshop']);
Route::post('/commentstroes',[FrontendController::class,'commentstroe']);
Route::get('/account',[FrontendController::class,'account'])->name('account');
Route::get('/order/{id}',[FrontendController::class,'order'])->name('order');
Route::get('/ordersendmail/{id}',[FrontendController::class,'sendmail'])->name('sendmail');
Route::post('/accountstore',[FrontendController::class,'accountstore'])->name('accountstore');
Route::get('/contact',[FrontendController::class,'contact'])->name('contact');
Route::get('/filterprice',[FrontendController::class,'filterprice']);
Route::get('/commper',[FrontendController::class,'commper'])->name('commper');
Route::post('/commperstore/{id}',[FrontendController::class,'commperstore']);
Route::get('/commperdelete/{id}',[FrontendController::class,'commperdelete']);
Route::post('/changepasswords',[FrontendController::class,'changepassword'])->name('changepassword');
Route::post('/contactstores',[FrontendController::class,'contactstore']);
Route::get('/logout',[FrontendController::class,'logout'])->name('logout');
Route::post('/replystroes',[FrontendController::class,'replystroe'])->name('replystore');
Route::get('/locale/{locale}',function($locale){
Session::put('locale',$locale);
return redirect()->route('home');
});
});
Auth::routes();
