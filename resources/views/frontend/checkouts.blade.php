@extends('layouts.home')
@section('content')
<div class="breadcrumb-area bg-gray">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="{{route('home')}}">Home</a>
                </li>
                <li class="active">Checkout </li>
            </ul>
        </div>
    </div>
</div>
<div class="checkout-main-area pt-120 pb-120" id="showcheckout">
    <div class="container">
        <div class="checkout-wrap pt-30">
            <div class="row">
                <div class="col-lg-7">
                    <div class="billing-info-wrap mr-50">
                        <h3>Billing Details</h3>
                        @if (session('message'))
                        <div class="alert alert-info mb-3">{{session('message')}}</div>
                       @endif
                        <form id="formpayment" enctype="multipart/form-data" method="post" >
                            @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20">
                                    <label>First Name <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" name="ordername">
                                    
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20">
                                    <label>Last Name <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" name="orderlname">
                                    
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-20">
                                    <label>Company Name <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" name="ordercompany">
                                   
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-20">
                                    <label>Street Address <abbr class="required" title="required">*</abbr></label>
                                    <input name="orderaddress1" class="billing-address" placeholder="House number and street name" type="text">
                                    
                                    <label>Street Address2 <abbr class="required" title="required">*</abbr></label>
                                    <input name="orderddress2" placeholder="Apartment, suite, unit etc." type="text">
                                   
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-20">
                                    <label>Town / City <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" name="ordercity">
                                    
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="billing-info mb-20">
                                    <label>State / County <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" name="ordercountry">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="billing-info mb-20">
                                    <label>Postcode / ZIP <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" name="orderpost">
                                    
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="billing-info mb-20">
                                    <label>Phone <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" name="orderphone">
                                    
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="billing-info mb-20">
                                    <label>Email Address <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" name="orderemail">
                                </div>
                            </div>
                        </div>
                        <div class="additional-info-wrap">
                            <label>Order notes</label>
                            <textarea name="ordernote" placeholder="Notes about your order, e.g. special notes for delivery. " name="message"></textarea>
                            
                        </div>
                        <div class="additional-info-wrap">
                            @php
                                $orders = App\Models\Order::all();
                            @endphp
                            @foreach($orders as $order)
                            <input type="hidden" name="stripeToken" value="{{$order->stripeToken}}">
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="your-order-area">
                        <h3>Your order</h3>
                        <div class="your-order-wrap gray-bg-4">
                            <div class="your-order-info-wrap">
                                <div class="your-order-info">
                                    <ul>
                                        <li>Product <span>Total</span></li>
                                    </ul>
                                </div>
                                <div class="your-order-middle">
                                    <ul>
                                        @foreach($cartcontens as $cartconten)
                                        <li>{{$cartconten->name}} {{$cartconten->qty}} <span>L.E{{$cartconten->price}}</span></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="your-order-info order-subtotal">
                                    <ul>
                                        <li>Subtotal <span>L.E{{$cartsubtotal}} </span></li>
                                    </ul>
                                </div>
                                <div class="your-order-info order-shipping">
                                    <ul>
                                        <li>Shipping <p>Enter your full address </p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="your-order-info order-total">
                                    <ul>
                                        <li>Total <span>L.E{{$carttotal}}</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="payment-method">
                                <div class="pay-top sin-payment">
                                    <input id="payment_method_1" class="input-radio" type="radio" value="cheque"  name="payment_method">
                                    <label for="payment_method_1"> Direct Bank Transfer </label>
                                    <div class="payment-box payment_method_bacs">
                                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference.</p>
                                    </div>
                                </div>
                                <div class="pay-top sin-payment">
                                    <input id="payment-method-2" class="input-radio" type="radio" value="cheque" name="payment_method">
                                    <label for="payment-method-2">Check payments</label>
                                    <div class="payment-box payment_method_bacs">
                                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference.</p>
                                    </div>
                                </div>
                                <div class="pay-top sin-payment">
                                    <input id="payment-method-3" class="input-radio" type="radio" value="CASH_ON_DELIVERY" name="orderstaus">
                                    <label for="payment-method-3">Cash on delivery </label>
                                    <div class="payment-box payment_method_bacs">
                                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference.</p>
                                    </div>
                                </div>
                                <div class="pay-top sin-payment sin-payment-3">
                                    <input id="gotostripepayment"  class="input-radio"    type="button" value="paymentstripr" name="orderstaus">
                                </div>
                                </div>                
                            </div>
                        </div>
                        <div class="Place-order">
                            <button type="button" class="btn btn-primary btn-lg form-control addnewcheckout">{{__('Place Order')}}</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('jquery-3.6.0.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).on('click','.addnewcheckout',function(e){
    e.preventDefault();
    var formdata = new FormData($('#formpayment')[0]);
    $.ajax({
        type:"post",
        url:"/checkoutstrore",
        enctype:"multipart/form-data",
        data:formdata,
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                $('#showcheckout').load(location.href + " #showcheckout");
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.sms);
            }
        }
    })
});
$(document).on('click','#gotostripepayment',function(e){
    e.preventDefault();
    $.ajax({
        type:"get",
        url:"/stripe",
        dataType:"html",
        success:function(res)
        {
            if(res)
            {
                $('#showcheckout').html(res);
            }
        }
    })
})
    });
</script>
@endsection