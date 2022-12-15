@extends('layouts.home')
@section('content')
<div class="breadcrumb-area bg-gray">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li class="active">Cart Page </li>
            </ul>
        </div>
    </div>
</div>
<div class="cart-main-area pt-115 pb-120" id="showcartw">
    @if($cartcontens->count() >0)
    <div class="container">
        <h3 class="cart-page-title">Your cart items</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="#">
                    <div class="table-content table-responsive cart-table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Until Price</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $subtotl =0;
                                @endphp
                                
                                @foreach($cartcontens as $cartconten)
                                @php
                                    $subtotl = $cartconten->price * $cartconten->qty;
                                @endphp
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="{{route('prodectdatils',$cartconten->id)}}"><img src="{{asset('admin_panel/img/'.$cartconten->options->images)}}" width="60" height="60" alt=""></a>
                                    </td>
                                    <td class="product-name"><a href="{{route('prodectdatils',$cartconten->id)}}">{{$cartconten->name}}</a></td>
                                    <td class="product-price-cart"><span class="amount">L.E{{$cartconten->price}}</span></td>
                                    <td class="product-quantity pro-details-quality">
                                        <div>
                                            <input class="cart-plus-minus-box editqty{{$cartconten->id}} text-center form-control" style="width:80px; height:40px;" type="number" id="editnewqty{{$cartconten->id}}" name="qty" value="{{$cartconten->qty}}">
                                            <input type="hidden" name="rowId" value="{{$cartconten->rowId}}" id="newrowIdsw{{$cartconten->id}}">
                                           
                                        </div>
                                    </td>
                                    <td class="product-subtotal">L.E{{$subtotl}}</td>
                                    <td class="product-remove">
                                        <a class="deletecart" offerdldelcart="{{$cartconten->rowId}}"><i class="icon_close"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-shiping-update-wrapper">
                                <div class="cart-shiping-update">
                                    <a href="{{route('shop')}}">Continue Shopping</a>
                                </div>
                                <div class="cart-clear">
                                    <a class="clearall">Clear Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="cart-tax">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gray">Estimate Shipping And Tax</h4>
                            </div>
                            <div class="tax-wrapper">
                                <p>Enter your destination to get a shipping estimate.</p>
                                <div class="tax-select-wrapper">
                                    <div class="tax-select">
                                        <label>
                                            * Country
                                        </label>
                                        <select class="email s-email s-wid">
                                            <option>Bangladesh</option>
                                            <option>Albania</option>
                                            <option>Åland Islands</option>
                                            <option>Afghanistan</option>
                                            <option>Belgium</option>
                                        </select>
                                    </div>
                                    <div class="tax-select">
                                        <label>
                                            * Region / State
                                        </label>
                                        <select class="email s-email s-wid">
                                            <option>Bangladesh</option>
                                            <option>Albania</option>
                                            <option>Åland Islands</option>
                                            <option>Afghanistan</option>
                                            <option>Belgium</option>
                                        </select>
                                    </div>
                                    <div class="tax-select">
                                        <label>
                                            * Zip/Postal Code
                                        </label>
                                        <input type="text">
                                    </div>
                                    <button class="cart-btn-2" type="submit">Get A Quote</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" style="text-align: left">
                        <div class="discount-code-wrapper">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4>
                            </div>
                            <div class="discount-code">
                                <p>Enter your coupon code if you have one.</p>
                                <form>
                                    <input type="text" required="" name="name">
                                    <button class="cart-btn-2" type="submit">Apply Coupon</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="grand-totall">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                            </div>
                            <h5>Total products <span>L.E{{$cartsubtotal}}</span></h5>
                            <div class="total-shipping">
                                <h5>Total shipping</h5>
                                <ul>
                                    <li><input type="checkbox"> Standard <span>$20.00</span></li>
                                    <li><input type="checkbox"> Express <span>$30.00</span></li>
                                </ul>
                            </div>
                            <h4 class="grand-totall-title">Grand Total <span>L.E{{$carttotal}}</span></h4>
                            <a href="{{route('checkout')}}">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    
    <div class="row" style="margin: 50px;text-align: center;">
        <div class="col-md-12 mb-3">
            <h1 style=" color:red;">{{__('Cart Is Empty Data')}}</h1>
        </div>
        <div class="col-md-12 mb-3">
            <a href="{{route('shop')}}" class="btn btn-danger btn-lg">{{__('Continue Shopping')}}</a>
        </div>
    </div>
    @endif
</div>
<script src="{{asset('jquery-3.6.0.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
@foreach($cartcontens as $cartconten)
$(document).on('click','.editqty{{$cartconten->id}}',function(e){
    e.preventDefault();
    var newQty = $('#editnewqty{{$cartconten->id}}').val();
    var newrowId = $('#newrowIdsw{{$cartconten->id}}').val();
    $.ajax({
        type:"get",
        url:"/cartupdates",
        data: "newrowId=" + newrowId + "&newQty=" + newQty,
        success:function(res)
        {
            if(res)
            {
                $('#showcartw').load(location.href + " #showcartw");
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.sms);
            }
        }
    });
});
@endforeach
$(document).on('click','.clearall',function(e){
    e.preventDefault();
    $.ajax({
        type:"get",
        url:"/clearall",
        data:{
            '_token' : '{{csrf_token()}}',
        },
        success:function(res)
        {
            if(res)
            {
                $('#showcartw').load(location.href + " #showcartw");
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.sms);
            }
        }
    });
});
$(document).on('click','.deletecart',function(e){
    e.preventDefault();
    var offerdelrsw = $(this).attr('offerdldelcart');
    $.ajax({
        type:"get",
        url:"/delete/"+offerdelrsw,
        data:{
            'id' : offerdelrsw,
            'token' : "{{csrf_token()}}",
        },
        success:function(res)
        {
            if(res)
            {
                $('#showcartw').load(location.href + " #showcartw");
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.sms);
            }
        }
    });
});
    });
</script>
@endsection