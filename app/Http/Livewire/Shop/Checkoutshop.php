<?php

namespace App\Http\Livewire\Shop;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\tranaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart;
use Exception;
use Stripe;
use Session;
class Checkoutshop extends Component
{
    public $wiremodals;
    public $wiremodal;
    public $ordername;
    public $orderlname;
    public $ordercountry;
    public $ordercity;
    public $orderpost;
    public $orderaddress1;
    public $orderddress2;
    public $orderphone;
    public $orderemail;
    public $ordercompany;
    public $orderstaus;
    public $ordernote;
    public $stripeToken;
    public function update($faildes)
    {
        $this->validateOnly($faildes,[
            'ordername' => 'required',
            'orderlname' => 'required',
            'ordercountry' => 'required',
            'ordercity' => 'required',
            'orderpost' => 'required',
            'orderaddress1' => 'required',
            'orderddress2' => 'required',
            'orderphone' => 'required',
            'orderemail' => 'required',
            'ordercompany' => 'required',
        ]);
    }
    public function addneworder()
    {
        $this->validate([
            'ordername' => 'required',
            'orderlname' => 'required',
            'ordercountry' => 'required',
            'ordercity' => 'required',
            'orderpost' => 'required',
            'orderaddress1' => 'required',
            'orderddress2' => 'required',
            'orderphone' => 'required',
            'orderemail' => 'required',
            'ordercompany' => 'required',
        ]);
        $order = new Order();
        $order->ordername = $this->ordername;
        $order->orderlname = $this->orderlname;
        $order->ordercountry = $this->ordercountry;
        $order->ordercity = $this->ordercity;
        $order->orderpost = $this->orderpost;
        $order->orderaddress1 = $this->orderaddress1;
        $order->orderddress2 = $this->orderddress2;
        $order->orderphone = $this->orderphone;
        $order->orderemail = $this->orderemail;
        $order->ordercompany = $this->ordercompany;
        $order->orderstaus = 'CASH ON DELIVERY';
        $order->ordernote = $this->ordernote;
        $order->save();
        foreach(Cart::instance('cart')->content() as $item)
        {
            $data = [
                'order_id' => $order->id,
                'user_id' => Auth::user()->id,
                'prodect_id' => $item->id,
                'qty' => $item->qty,
                'amount' => $item->price,
                'total' => $item->price * $item->qty,
            ];
            OrderItem::create($data);
        }
        if($this->wiremodal=='code')
        {
            $transtion = new tranaction();
            $transtion->user_id = Auth::user()->id;
            $transtion->order_id = $order->id;
            $transtion->mode = 'code';
            $transtion->staus = 'CASH ON DELIVERY';
            $transtion->save();
        }
        if($this->wiremodals=='paymentstripr')
        {
            $total=0;
            foreach(Cart::instance('cart')->content() as $itew)
            {
                $total+= $itew->price * $itew->qty;
            }
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            dd($token = $this->stripeToken);
        try {
            Stripe\Charge::create ([
                "amount" => $total *100,
                "currency" => "usd",
                "description" => "Making test payment.",
                "source" => $this->stripeToken,
                'shipping' => [
                    'name' => Auth::user()->name,
                    'phone' => "0112345849",
                    'address' => [
                        'line1' => "12algizealsude",
                        'line2' => "13algizealsude",
                        'postal_code' => "1234",
                        'city' => "Atbra",
                        'state' => "Africa",
                        'country' => 'Sudan',
                    ],
                ],
            ]);
        $order = new Order();
        $order->ordername = $this->ordername;
        $order->orderlname = $this->orderlname;
        $order->ordercountry = $this->ordercountry;
        $order->ordercity = $this->ordercity;
        $order->orderpost = $this->orderpost;
        $order->orderaddress1 = $this->orderaddress1;
        $order->orderddress2 = $this->orderddress2;
        $order->orderphone = $this->orderphone;
        $order->orderemail = $this->orderemail;
        $order->ordercompany = $this->ordercompany;
        $order->orderstaus = 'Stripe payment';
        $order->ordernote = $this->ordernote;
        $order->stripeToken = $this->stripeToken;
        $order->save();
    } catch (\Exception $e) {
        foreach(Cart::instance('cart')->content() as $item)
        {
            $data = [
                'order_id' => $order->id,
                'user_id' => Auth::user()->id,
                'prodect_id' => $item->id,
                'qty' => $item->qty,
                'amount' => $item->price,
                'total' => $item->price * $item->qty,
            ];
            OrderItem::create($data);
        }
            $transtion = new tranaction();
            $transtion->user_id = Auth::user()->id;
            $transtion->order_id = $order->id;
            $transtion->mode = 'paymentstripr';
            $transtion->staus = 'Stripe Payment';
            $transtion->save();
        } catch (\Exception $e) {
        }
        Cart::instance('cart')->destroy();
        return redirect()->with('message','Checkout Order Is Created');
    }
}
    public function render()
    {
        return view('livewire.shop.checkoutshop');
    }
}