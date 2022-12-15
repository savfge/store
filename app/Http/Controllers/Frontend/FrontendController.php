<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Admin\Prodectattr;
use App\Http\Controllers\Controller;
use App\Mail\Sendcontactmail;
use App\Mail\Sendmail;
use App\Models\About;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Color;
use App\Models\Comment;
use App\Models\Commper;
use App\Models\Contact;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Prodectatrbite;
use App\Models\Product;
use App\Models\Reply;
use App\Models\Review;
use App\Models\Silder;
use App\Models\tranaction;
use App\Models\User;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Stripe;
use Session;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class FrontendController extends Controller
{
    public function index()
    {
        $silders = Silder::where('staus',1)->orderBy('id','Desc')->get();
        $categorys = Category::all();
        return view('frontend.index',compact('silders','categorys'));
    }
    public function shop()
    {
        return view('frontend.shop');
    }
    public function shops(Request $request)
    {
        if($request->sort_by=='defult')
        {
            $shops = Product::orderBy('id','DESC')->get();
        }
        if($request->sort_by=='name')
        {
            $shops = Product::orderBy('en_name','DESC')->get();
        }
        if($request->sort_by=='namez')
        {
            $shops = Product::orderBy('en_name', 'ASC')->get();
        }
        if($request->sort_by=='heightprice')
        {
            $shops = Product::orderBy('new_price','DESC')->get();
        }
        if($request->sort_by=='lowprice')
        {
            $shops = Product::orderBy('new_price', 'ASC')->get();
        }
        if($request->sort_by=='dataasc')
        {
            $shops = Product::orderBy('created_at','DESC')->get();
        }
        if($request->sort_by=='datdesc')
        {
            $shops = Product::orderBy('new_price', 'ASC')->get();
        }
        return view('frontend.shops',compact('shops'))->render();
    }
    public function category($id)
    {
        $shops = Product::where('category_id',$id)->paginate('12');
        return view('frontend.shops',compact('shops'));
    }
    public function filterprice(Request $request)
    {
        $shops = Product::whereBetween("new_price",[$request->input_left,$request->input_right])->get();
        return view('frontend.shops',compact('shops'))->render();
    }
    public function stock($id)
    {
        $shops = Product::where('stock_id',$id)->pginate('12');
        return view('frontend.shops',compact('shops'));
    }
    public function color($id)
    {
        $shops = Product::where('color_id',$id)->paginate('12');
        return view('frontend.shops',compact('shops'));
    }
    public function size($id)
    {
        $shops = Product::where('size_id',$id)->paginate('12');
        return view('frontend.shops',compact('shops'));
    }
    public function subcategory($id)
    {
        $shops = Product::where('subcategory_id',$id)->paginate('12');
        return view('frontend.shops',compact('shops'));
    }
    public function prodectdatils(Request $request , $id)
    {
        $proddect = Product::findOrfail($id);
        $prodectmanre = Product::where('subcategory_id',$proddect->subcategory_id)->get();
        $prodectcol = Prodectatrbite::where('prodect_id',$proddect->id)->get();
        return view('frontend.prodectdatils',compact('proddect','prodectmanre','prodectcol'));
    }
    public function cartstore(Request $request)
    {
        $prodect = Product::find($request->prodect_id);
        Cart::instance('cart')->add([
            'id' => $prodect->id,
            'qty' => $request->qtybutton,
            'weight' => 10,
            'price' => $prodect->new_price,
            'name' => $prodect->en_name,
            'options' => [
                'images' => $prodect->image,
                'size' => $prodect->size->en_name,
                'stock' => $prodect->stock->en_name,
                'color' => $prodect->color->en_name,
            ],
        ]);
        return response()->json(['sms' => $prodect->en_name.'<br> Add New Cart Is Succesed <br>']);
    }
    public function cart()
    {
        return view('frontend.cart');
    }
    public function cartupdate(Request $request)
    {
         $qty = $request->newQty;
         $rowId = $request->newrowId;
         Cart::instance('cart')->update($rowId,$qty);
         return response()->json(['sms' => 'Cart Is  Updated']);
    }
    public function delete($rowId)
    {
        Cart::instance('cart')->remove($rowId);
         return response()->json(['sms' => 'Cart Is  Deleted']);
    }
    public function clearall()
    {
        $cartcontnes = Cart::instance('cart')->content();
        Cart::instance('cart')->destroy($cartcontnes);
        return response()->json(['sms' => 'Cart Is  Clear All']);
    }
    public function wishlisstore($id)
    {
         $wishlist = Product::findOrfail($id);
         Cart::instance('wishlist')->add([
            'id' => $id,
            'weight' => 10,
            'qty' => 3,
            'name' => $wishlist->en_name,
            'price' => $wishlist->new_price,
            'options' => [
                'images' => $wishlist->image,
                'size' => $wishlist->size->en_name,
                'color' => $wishlist->color->en_name,
                'stock' => $wishlist->stock->en_name,
            ],
        ]);
        return response()->json(['sms' => $wishlist->en_name.'<br> Add New Wishlist Is Succesed <br>']);
    }
    public function carts($id)
    {
        $prodect = Product::findOrfail($id);
        Cart::instance('cart')->add([
            'id' => $id,
            'weight' => 10,
            'qty' => 3,
            'name' => $prodect->en_name,
            'price' => $prodect->new_price,
            'options' => [
                'images' => $prodect->image,
                'size' => $prodect->size->en_name,
                'color' => $prodect->color->en_name,
                'stock' => $prodect->stock->en_name,
            ],
        ]);
        return response()->json(['sms' => $prodect->en_name.'<br> Add New Cart Is Succesed <br>']);
    }
    public function wishlist()
    {
        return view('frontend.wishlist');
    }
    public function checkout()
    {
        return view('frontend.checkout');
    }
    public function blog()
    {
        return view('frontend.blog');
    }
    public function blogs(Request $request , $id)
    {
        $blog = Blog::findOrfail($id);
        $blogsresent = Blog::latest()->take('3')->get();
        $comments = Comment::paginate('3');
        $replyser = Comment::find($request->id);
        return view('frontend.blogs',compact('blog','blogsresent','comments','replyser'));
    }
    public function commentstroe(Request $request)
    {
        $data = array(
            'user_id' => Auth::user()->id,
            'blog_id' => $request->blog_id,
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
        );
        Comment::create($data);
        return response()->json(['sms' => 'Comment Is Created']);
    }
    public function showblogcate($id)
    {
        $blogs = Product::where('category_id',$id)->paginate('10');
        return view('frontend.showblogcate',compact('blogs'));
    } 
    public function subcategoryshow($id)
    {
        $blogs = Product::where('subcategory_id',$id)->paginate('10');
        return view('frontend.showblogcate',compact('blogs'));
    }
    public function reviewstore(Request $request)
    {
        $data = array(
            'prodect_id' => $request->prodect_id,
            'user_id' => Auth::user()->id,
            'review' => $request->review,
            'comment' => $request->comment,
            'name' => $request->name,
            'email' => $request->email,
        );
        Review::create($data);
        return response()->json(['sms' => 'Review Is Created']);
    }
    public function checkouts()
    {
        return view('frontend.checkouts');
    }
    public function checkoutstrore(Request $request)
    {
        if($request->orderstaus=='CASH_ON_DELIVERY')
        {
            $order = new Order();
            $order->ordername= $request->input('ordername');
            $order->orderlname = $request->input('orderlname');
            $order->ordercountry = $request->input('ordercountry');
            $order->ordercity = $request->input('ordercity');
            $order->orderpost = $request->input('orderpost');
            $order->orderaddress1 = $request->input('orderaddress1');
            $order->orderddress2 = $request->input('orderddress2');
            $order->orderphone = $request->input('orderphone');
            $order->orderemail = $request->input('orderemail');
            $order->ordercompany = $request->input('ordercompany');
            $order->orderstaus = 'CASH_ON_DELIVERY';
            $order->ordernote = $request->input('ordernote');
            $order->stripeToken = $request->input('stripeToken');
            $order->save();
            foreach(Cart::instance('cart')->content() as $itemn)
            {
                $data = [
                    'order_id' => $order->id,
                    'user_id' => Auth::user()->id,
                    'prodect_id' => $itemn->id,
                    'qty' => $itemn->qty,
                    'amount' => $itemn->price,
                    'total' => $itemn->price * $itemn->qty,
                ];
                OrderItem::create($data);
            }
            $transaction = new tranaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order->id;
            $transaction->mode = 'code';
            $transaction->staus = 'CASH ON DELIVERY';
            $transaction->save();
            Cart::instance('cart')->destroy();
            return response()->json(['sms' => 'Checkout IS Created']);
        }
    }
    public function stripe()
    {
        return view('frontend.stripe');
    }
    public function stripepaymentstore(Request $request)
    {
        $total=0;
        foreach(Cart::instance('cart')->content() as $items)
        {
            $total+=$items->price * $items->qty;
        }

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        // dd($token = $request->stripeToken);
        try {
        Stripe\Charge::create ([
                "amount" => $total*100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Making test payment." ,
        ]);
            $order = new Order();
            $order->ordername= $request->input('ordername');
            $order->orderlname = $request->input('orderlname');
            $order->ordercountry = $request->input('ordercountry');
            $order->ordercity = $request->input('ordercity');
            $order->orderpost = $request->input('orderpost');
            $order->orderaddress1 = $request->input('orderaddress1');
            $order->orderddress2 = $request->input('orderddress2');
            $order->orderphone = $request->input('orderphone');
            $order->orderemail = $request->input('orderemail');
            $order->ordercompany = $request->input('ordercompany');
            $order->orderstaus = 'Stipe Payment';
            $order->ordernote = $request->input('ordernote');
            $order->stripeToken = $request->input('stripeToken');
            $order->save();
            foreach(Cart::instance('cart')->content() as $itemn)
            {
                $data = [
                    'order_id' => $order->id,
                    'user_id' => Auth::user()->id,
                    'prodect_id' => $itemn->id,
                    'qty' => $itemn->qty,
                    'amount' => $itemn->price,
                    'total' => $itemn->price * $itemn->qty,
                ];
                OrderItem::create($data);
            }
            $transaction = new tranaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order->id;
            $transaction->mode = 'code';
            $transaction->staus = 'Stripe Payment';
            $transaction->save();
    } catch (\Exception $e) {
    }
    return redirect()->back();
    }
    public function search(Request $request)
    {
        $search = $request->search;
        $shops = Product::where('en_name','Like','%'.$search.'%')->paginate('4');
        return view('frontend.search',compact('shops'));
    }
    public function searchshop(Request $request)
    {
        $searchshop = $request->searchshop;
        $shops = Product::where('en_name','Like','%'.$searchshop.'%')->get();
        return view('frontend.shops',compact('shops'));
    }
    public function account()
    {
        $orders = Order::all();
        return view('frontend.account',compact('orders'));
    }
    public function order($id)
    {
        $order = Order::findOrfail($id);
        return view('frontend.order',compact('order'));
    }
    public function sendmail($id)
    {
        $order = Order::findOrfail($id);
        Mail::to($order->orderemail)->send(new Sendmail($order));
        return view('frontend.sendmail',compact('order'));
    }
    public function accountstore(Request $request)
    {
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $fileExpnsw = $file->getClientOriginalName();
            $fileName = time().'.'.$fileExpnsw;
            $file->move('admin_panel/img/',$fileName);
            Auth::user()->image = $fileName;
        }
        Auth::user()->name = $request->input('name');
        Auth::user()->lname = $request->input('lname');
        Auth::user()->address1 = $request->input('address1');
        Auth::user()->address2 = $request->input('address2');
        Auth::user()->country = $request->input('country');
        Auth::user()->city = $request->input('city');
        Auth::user()->email = $request->input('email');
        Auth::user()->postcode = $request->input('postcode');
        Auth::user()->phone = $request->input('phone');
        Auth::user()->update();
        return response()->json(['sms'=> 'Account User Is Updated']);
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function about()
    {
        $abouts = About::where('staus',1)->orderBy('id','Desc')->paginate('1');
        $aboutsimge = About::where('staus',1)->orderBy('id','Desc')->paginate('2');
        $teams = About::where('staus',2)->orderBy('id','Desc')->get();
        $teatmtion = About::where('staus',3)->orderBy('id','Desc')->get();
        return view('frontend.about',compact('abouts','aboutsimge','teams','teatmtion'));
    }
    public function commper()
    {
        $commpers = Commper::all();
        return view('frontend.commper',compact('commpers'));
    }
    public function commperstore($id)
    {
        $data = array(
            'user_id' => Auth::user()->id,
            'prodect_id' => $id,
        );
        Commper::create($data);
        return response()->json(['sms' => 'Commper Is Created']);
    }
    public function commperdelete($id)
    {
        $commper = Commper::findOrfail($id);
        $commper->delete();
        return response()->json(['sms' =>'Commpoers  Is Deletes']);
    }
    public function changepassword(Request $request)
    {
        $valdtationpassword = $request->validate([
            'password' => 'required',
            'oldpassword' => 'required',
        ]);
        $hashmakepassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashmakepassword))
        {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json(['sms' => 'Change Password Is Successed']);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function contactstore(Request $request)
    {
        $contact = new Contact();
        $contact->email = $request->input('email');
        $contact->name = $request->input('name');
        $contact->subject = $request->input('subject');
        $contact->message = $request->input('message');
        $contact->save();
        Mail::to($contact->email)->send(new Sendcontactmail($contact));
        return response()->json(['sms' => 'Contact Us  Is Successed']);
    }
    public function replystroe(Request $request)
    {
        $data = array(
            'message' => $request->message,
            'commnet_id' => $request->commentId,
            'name' => $request->name,
            'user_id' => Auth::user()->id,
        );
        Reply::create($data);
        return response()->json(['sms' => 'Add New Reply Is Successed']);
    }
}
