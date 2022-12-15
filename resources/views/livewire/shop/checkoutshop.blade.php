<div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <div class="checkout-main-area pt-120 pb-120">
        <div class="container">
            <div class="checkout-wrap pt-30">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="billing-info-wrap mr-50">
                            <h3>Billing Details</h3>
                            @if (session('message'))
                            <div class="alert alert-info mb-3">{{session('message')}}</div>
                           @endif
                            <form wire:submit.prevent='addneworder'
                            
                            id="checkout-form2">
                                @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20">
                                        <label>First Name <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" wire:model='ordername'>
                                        @error('ordername')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20">
                                        <label>Last Name <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" wire:model='orderlname'>
                                        @error('orderlname')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label>Company Name <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" wire:model='ordercompany'>
                                        @error('ordercompany')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label>Street Address <abbr class="required" title="required">*</abbr></label>
                                        <input wire:model='orderaddress1' class="billing-address" placeholder="House number and street name" type="text">
                                        @error('orderaddress1')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <label>Street Address2 <abbr class="required" title="required">*</abbr></label>
                                        <input wire:model='orderddress2' placeholder="Apartment, suite, unit etc." type="text">
                                        @error('orderddress2')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label>Town / City <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" wire:model='ordercity'>
                                        @error('ordercity')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="billing-info mb-20">
                                        <label>State / County <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" wire:model='ordercountry'>
                                        @error('ordercountry')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="billing-info mb-20">
                                        <label>Postcode / ZIP <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" wire:model='orderpost'>
                                        @error('orderpost')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="billing-info mb-20">
                                        <label>Phone <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" wire:model='orderphone'>
                                        @error('orderphone')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="billing-info mb-20">
                                        <label>Email Address <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" wire:model='orderemail'>
                                        @error('orderemail')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            @php
                                $orders = App\Models\Order::all();
                            @endphp
                            @foreach($orders as $order)
                            <input type="hidden" value="{{$order->stripeToken}}" name="stripeToken">
                            @endforeach
                            <div class="additional-info-wrap">
                                <label>Order notes</label>
                                <textarea wire:model='ordernote' placeholder="Notes about your order, e.g. special notes for delivery. " name="message"></textarea>
                                @error('ordernote')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
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
                                        <input id="payment-method-3" class="input-radio" type="radio" wire:model='wiremodal' value="code" name="payment_method">
                                        <label for="payment-method-3">Cash on delivery </label>
                                        <div class="payment-box payment_method_bacs">
                                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference.</p>
                                        </div>
                                    </div>
                                    <div class="pay-top sin-payment sin-payment-3">
                                        <input id="payment-method-4" class="input-radio" wire:model='wiremodals' type="radio" value="paymentstripr" name="payment_method">
                                        <label for="payment-method-4">PayPal <img alt="" src="assets/images/icon-img/payment.png"><a href="#">What is PayPal?</a></label>
                                        <div class="payment-box payment_method_bacs">
                                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference.</p>
                                        </div>
                                    </div>
                                    @if ($wiremodals=='paymentstripr')
                                    <div class="col-lg-12 col-md-3">
                                        <div class="billing-info mb-20 required">
                                            <label class='control-label'>Name on Card</label> <input
                                             class='form-control' size='4' type='text'>
                                        </div>
                                    </div>  
                                    <div class="col-lg-12 col-md-3">
                                        <div class="billing-info mb-20 cardb required">
                                            <label class='control-label'>Card Number</label> <input
                                    autocomplete='off' class='form-control card-num' size='20'
                                    type='text'>
                                        </div>
                                    </div> 
                                    <div class="col-lg-12 col-md-3">
                                        <div class="billing-info mb-20 cvc required">
                                            <label class='control-label'>CVC</label> 
                                            <input autocomplete='off' class='form-control card-cvc' placeholder='e.g 415' size='4'
                                                type="password">
                                        </div>
                                    </div> 
                                    <div class="col-lg-12 col-md-3">
                                        <div class="billing-info mb-20 expiration required">
                                            <label class='control-label'>Expiration Month</label> <input
                                            class='form-control card-expiry-month' placeholder='MM' size='2'
                                            type='text'>
                                        </div>
                                    </div>     
                                    <div class="col-lg-12 col-md-3">
                                        <div class="billing-info mb-20 expiration required">
                                            <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text'>
                                        </div>
                                    </div>                 
                           @endif
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
    {{-- <script type="text/javascript" src="https://js.stripe.com/v2/"></script> --}}
  <script>
    Stripe.setPublishableKey('pk_test_51M57MuCKx2bVAHYJJ0EZhBQJXPOLjTVg6puuEuSpIIBWNCsDFTJmXVPsnC06v6aMFLH0T4Zm0FTmPiEZdQVCHpsX00E2TQ2GkV');

var $form = $('#checkout-form2');

$form.submit(function (event) {
    $('#checkout-error').addClass('hidden');
    $form.find('button').prop('disabled', true);
    Stripe.card.createToken({
        number: $('#card-number').val(),
        cvc: $('#card-cvc').val(),
        exp_month: $('#card-expiry-month').val(),
        exp_year: $('#card-expiry-year').val(),
        name: $('#card-name').val()
    }, stripeResponseHandler);
    return false;
});

function stripeResponseHandler(status, response) {
    if(response.error) {
        $('#checkout-error').removeClass('hidden');
        $('#checkout-error').text(response.error.message);
        $form.find('button').prop('disabled', false);
    } else {
        var token = response.id;
        $form.append($('<input type="hidden" name="stripeToken" />').val(token));
        $form.get(0).submit();
    }
}


  </script>

  

</div>
