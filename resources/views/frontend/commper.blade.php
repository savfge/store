@extends('layouts.home')
@section('content')
<div class="breadcrumb-area bg-gray">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="{{route('home')}}">Home</a>
                </li>
                <li class="active">Compare </li>
            </ul>
        </div>
    </div>
</div>
<div class="compare-page-wrapper pt-120 pb-120" id="showcommper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Compare Page Content Start -->
                <div class="compare-page-content-wrap">
                    <div class="compare-table table-responsive">
                        <table class="table table-bordered mb-0">
                            <tbody>
                               
                                <tr>
                                    <td class="first-column">Product</td>
                                    @foreach($commpers as $commper)
                                    <td class="product-image-title">
                                        <a href="{{route('prodectdatils',$commper->id)}}" class="image">
                                            <img class="img-fluid" src="{{asset('admin_panel/img/'.$commper->prodect->image)}}" style="width:300px;height:300px;" alt="Compare Product">
                                        </a>
                                        <a href="{{route('shop')}}" class="category">{{$commper->prodect->category->en_name}}</a>
                                        <a href="{{route('prodectdatils',$commper->id)}}" class="title">{{$commper->prodect->en_name}}</a>
                                    </td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td class="first-column">Description</td>
                                    @foreach($commpers as $commper)
                                    <td class="pro-desc">
                                        <p>{{$commper->prodect->short_desc}}<br><br></p>
                                    </td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td class="first-column">Price</td>
                                    @foreach($commpers as $commper)
                                    <td class="pro-price">L.E{{$commper->prodect->new_price}}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td class="first-column">Color</td>
                                    @foreach($commpers as $commper)
                                    <td class="pro-color">{{$commper->prodect->color->en_name}}</td> 
                                    @endforeach
                                </tr>
                                <tr>
                                    <td class="first-column">Stock</td>
                                    @foreach($commpers as $commper)
                                    <td class="pro-stock">{{$commper->prodect->stock->en_name}}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td class="first-column">Add to cart</td>
                                    @php
                                        $cartwser = Cart::instance('cart')->content()->pluck('id');
                                    @endphp
                                    @foreach($commpers as $commper)
                                    @if ($cartwser->contains($commper->prodect->id))
                                    <td><a class="check-btn">{{__('Not Add New Cart')}}</a></td>   
                                    @else
                                    <td><a offercarft="{{$commper->prodect->id}}" class="check-btn addnewcommpers">Add to Cart</a></td>
                                    @endif
                                    
                                    @endforeach
                                </tr>
                                <tr>
                                    <td class="first-column">Rating</td>
                                    @foreach($commpers as $commper)
                                    <td class="pro-ratting">
                                        @php
                                            $avarage = $commper->prodect->review->average('review');
                                        @endphp
                                        @for ($i=0;$i<5;$i++)
                                            @if ($avarage>$i)
                                            <i class="icon_star"></i>  
                                            @else
                                            <i class="icon_star" style="color: gray"></i>  
                                            @endif
                                        @endfor
                                    </td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td class="first-column">Remove</td>
                                    @foreach($commpers as $commper)
                                    <td class="pro-remove">
                                        <button value="{{$commper->prodect->id}}" class="deletecommpere"><i class="icon-trash"></i></button>
                                    </td>
                                    @endforeach
                                </tr>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Compare Page Content End -->
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
$(document).on('click','.addnewcommpers',function(e){
    e.preventDefault();
    offervalue = $(this).attr('offercarft');
    $.ajax({
        type:"post",
        url:"/carts/"+offervalue,
        data:{
            'id' :offervalue,
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
    });
});
$(document).on('click','.deletecommpere',function(e){
    e.preventDefault();
    var offerdelete= $(this).val();
    $.ajax({
        type:"get",
        url:"/commperdelete/"+offerdelete,
        data:{
            'id' : offerdelete,
            '_token' : "{{csrf_token()}}",
        },
        success:function(res)
        {
            if(res)
            {
                $('#showcommper').load(location.href + " #showcommper");
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.sms);
            }
        }
    });
});
    });
</script>
@endsection