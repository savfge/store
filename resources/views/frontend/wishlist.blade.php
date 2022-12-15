@extends('layouts.home')
@section('content')
<div class="breadcrumb-area bg-gray">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="{{route('home')}}">Home</a>
                </li>
                <li class="active">Wishlist </li>
            </ul>
        </div>
    </div>
</div>
@if($cartwishlists->count() > 0)
<div class="cart-main-area pt-115 pb-120">
    <div class="container">
        <h3 class="cart-page-title">Your Wishlist items</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="#">
                    <div class="table-content table-responsive cart-table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>{{__('Stock')}}</th>
                                    <th>{{__('Color')}}</th>
                                    <th>Until Price</th>
                                    <th>Subtotal</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $wishlisttotl =0;
                                @endphp
                                @foreach($cartwishlists as $cartwishlist)
                                @php
                                $wishlisttotl = $cartwishlist->price * $cartwishlist->qty;
                                @endphp
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="{{route('prodectdatils',$cartwishlist->id)}}"><img src="{{asset('admin_panel/img/'.$cartwishlist->options->images)}}" width="100" height="100" alt=""></a>
                                    </td>
                                    <td class="product-name"><a href="#">{{$cartwishlist->name}}</a></td>
                                    <td class="product-name">{{$cartwishlist->options->stock}}</td>
                                    <td class="product-name">{{$cartwishlist->options->color}}</td>
                                    <td class="product-price-cart"><span class="amount">L.E{{$cartwishlist->price}}</span></td>
                                    <td class="product-subtotal">L.E{{$wishlisttotl}}</td>
                                    <td class="product-wishlist-cart">
                                        <a class="addnewcart" offercart="{{$cartwishlist->id}}">add to cart</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@else
    
    <div class="row" style="margin: 50px;text-align: center;">
        <div class="col-md-12 mb-3">
            <h1 style=" color:red;">{{__('Wishlist Is Empty Data')}}</h1>
        </div>
        <div class="col-md-12 mb-3">
            <a href="{{route('shop')}}" class="btn btn-danger btn-lg">{{__('Continue Shopping')}}</a>
        </div>
    </div>
    @endif
    <script src="{{asset('jquery-3.6.0.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).on('click','.addnewcart',function(e){
    e.preventDefault();
    var offercart = $(this).attr('offercart');
    $.ajax({
        type:"post",
        url:"/carts/"+offercart,
        data:{
            'id' : offercart,
            '_token' : "{{csrf_token()}}",
        },
        success:function(res)
        {
            if(res)
            {
                $('#showcount').load(location.href + " #showcount");
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.sms);
                window.location.href ='/cart';
            }
        }
    })
})
        });
    </script>
@endsection