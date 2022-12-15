@extends('layouts.home')
@section('content')
<div class="breadcrumb-area bg-gray">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="{{route('home')}}">Home</a>
                </li>
                <li class="active">Checkout With Stripe Payment </li>
            </ul>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
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
                       <form role="form" action="{{ route('stripepaymentstore') }}" method="post" class="validation"
                       data-cc-on-file="false"
                      data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                      id="payment-form">
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
                            <div class="col-lg-12 col-md-12">
                                <div class="billing-info mb-20 required">
                                    <label class='control-label'>Name on Card</label> <input
                                    class='form-control' type='text'>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="billing-info mb-20 required">
                                    <label class='control-label'>Card Number</label> <input
                                    autocomplete='off' class='form-control card-num' 
                                    type='text'>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="billing-info mb-20 required">
                                    <label class='control-label'>CVC</label> 
                                    <input autocomplete='off' class='form-control card-cvc' placeholder='e.g 415' 
                                        type='text'>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="billing-info mb-20 required">
                                    <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' placeholder='MM'
                                    type='text'>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="billing-info mb-20 required">
                                    <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' 
                                    type='text'>
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
                        </div>
                        <div class="Place-order">
                            <button type="submit" class="btn btn-primary btn-lg form-control">{{__('Place Order')}}</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
<script type="text/javascript">
$(function() {
    var $form         = $(".validation");
  $('form.validation').bind('submit', function(e) {
    var $form         = $(".validation"),
        inputVal = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputVal),
        $errorStatus = $form.find('div.error'),
        valid         = true;
        $errorStatus.addClass('hide');
 
        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorStatus.removeClass('hide');
        e.preventDefault();
      }
    });
  
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-num').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeHandleResponse);
    }
  
  });
  
  function stripeHandleResponse(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
  
});
</script>
@endsection