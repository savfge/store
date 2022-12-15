@extends('layouts.home')
@section('content')
    <div class="shop-area pt-120 pb-120">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    <div class="shop-topbar-wrapper">
                        <div class="shop-topbar-left">
                            <div class="view-mode nav">
                                <a class="active" href="#shop-1" data-toggle="tab"><i class="icon-grid"></i></a>
                                <a href="#shop-2" data-toggle="tab"><i class="icon-menu"></i></a>
                            </div>
                           
                        </div>
                        <div class="product-sorting-wrapper">
                            {{-- <div class="product-shorting shorting-style">
                                <label>View :</label>
                                <select>
                                    <option class="{{$pagesize==12 ? 'active': ''}}"  wire:click.prevent="changepagesize(12)"> 12</option>
                                    <option class="{{$pagesize==15 ? 'active': ''}}"  wire:click.prevent="changepagesize(15)"> 15</option>
                                    <option class="{{$pagesize==25 ? 'active': ''}}"  wire:click.prevent="changepagesize(25)"> 25</option>
                                    <option class="{{$pagesize==32 ? 'active': ''}}" wire:click.prevent="changepagesize(32)"> 32</option>
                                </select>
                            </div> --}}
                            <div class="product-show shorting-style">
                                <label>Sort by :</label>
                                <select name="sort_by" id="sort_by">
                                    <option value="defult">Default</option>
                                    <option value="name">A,Z,Name</option>
                                    <option value="namez">Z,A,Name</option>
                                    <option value="heightprice"> Hight price</option>
                                    <option value="lowprice">Low Price</option>
                                    <option value="dataasc">DateAcs</option>
                                    <option value="datdesc">DateDescs</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="shop-bottom-area">
                        <div class="tab-content jump">
                            <div id="shop-1" class="tab-pane active">
                                <div id="showsortby">
                                <div class="row">
                                    @php
                            $washile = Cart::instance('wishlist')->content()->pluck('id');
                        @endphp
                        @php
                            $cartdew = Cart::instance('cart')->content()->pluck('id');
                        @endphp
                                    @foreach($shops as $shop)
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="single-product-wrap mb-35">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="{{asset('admin_panel/img/'.$shop->image)}}" width="250" height="250" alt="">
                                                </a>
                                                <div class="product-action-2 tooltip-style-2">
                                                    @if ($washile->contains($shop->id))
                                                    <button title="Wishlist" style="color:orange"><i class="icon-heart"></i></button>  
                                                    @else
                                                    <button title="Wishlist" class="addnewwithlis" value="{{$shop->id}}"><i class="icon-heart"></i></button>    
                                                    @endif
                                                    
                                                    <button title="Quick View" data-toggle="modal" data-target="#exampleModal{{$shop->id}}"><i class="icon-size-fullscreen icons"></i></button>
                                                    <button title="Compare"><i class="icon-refresh"></i></button>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <div class="product-rating-wrap">
                                                    <div class="product-rating">
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star gray"></i>
                                                    </div>
                                                    <span>(2)</span>
                                                </div>
                                                <h3><a href="product-details.html">{{$shop->en_name}}</a></h3>
                                                <div class="product-price-2">
                                                    <span>L.E{{$shop->new_price}}</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-position text-center">
                                                <div class="product-rating-wrap">
                                                    <div class="product-rating">
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star gray"></i>
                                                    </div>
                                                    <span>(2)</span>
                                                </div>
                                                <h3><a href="product-details.html">{{$shop->en_name}}</a></h3>
                                                <div class="product-price-2">
                                                    <span>L.E{{$shop->new_price}}</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    @if ($cartdew->contains($shop->id))
                                                    <button title="Add to Cart">Add To Cart</button>  
                                                    @else
                                                    <button title="Add to Cart" class="addnewcart" value="{{$shop->id}}">Add To Cart</button> 
                                                    @endif
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                </div>
                            </div>
                            <div id="shop-2" class="tab-pane">
                                <div class="shop-list-wrap mb-30">
                                    @php
                                    $washile = Cart::instance('wishlist')->content()->pluck('id');
                                @endphp
                                @php
                                    $cartdew = Cart::instance('cart')->content()->pluck('id');
                                @endphp
                                    @foreach($shops as $shop)
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-6">
                                            <div class="product-list-img" style="margin:20px;">
                                                <a href="product-details.html">
                                                    <img src="{{asset('admin_panel/img/'.$shop->image)}}" width="200" height="200" alt="Product Style">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-6">
                                            <div class="shop-list-content">
                                                <h3><a href="product-details.html">{{$shop->en_name}}</a></h3>
                                                <div class="pro-list-price">
                                                    <span class="new-price">L.E{{$shop->new_price}}</span>
                                                    <span class="old-price">L.E{{$shop->old_price}}</span>
                                                </div>
                                                <div class="product-list-rating-wrap">
                                                    <div class="product-list-rating">
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star gray"></i>
                                                        <i class="icon_star gray"></i>
                                                    </div>
                                                    <span>(3)</span>
                                                </div>
                                                <p>{{$shop->short_desc}}<br><br>.</p>
                                                <div class="product-list-action" style="margin: 20px;">
                                                    @if ($cartdew->contains($shop->id))
                                                    <button title="Add To Cart"><i class="icon-basket-loaded"></i></button>
                                                    @else
                                                    <button title="Add To Cart" class="addnewcart" value="{{$shop->id}}"><i class="icon-basket-loaded"></i></button>
                                                    @endif
                                                    @if ($washile->contains($shop->id))
                                                    <button title="Wishlist"  style="color:orange"><i class="icon-heart"></i></button>
                                                    @else
                                                    <button title="Wishlist"  class="addnewwithlis" value="{{$shop->id}}"><i class="icon-heart"></i></button>
                                                    @endif
                                                    <button title="Compare"><i class="icon-refresh"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                
                            </div>
                        </div>
                        <div class="pro-pagination-style text-center mt-10">
                            {!! $shops->links() !!}
                            <style>
                                svg{
                                    height: 30px;
                                }
                            </style>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="sidebar-wrapper sidebar-wrapper-mrg-right">
                        <div class="sidebar-widget mb-40">
                            <h4 class="sidebar-widget-title">Search </h4>
                            <div class="sidebar-search">
                                <form class="sidebar-search-form" action="#">
                                    <input type="text" placeholder="Search here...">
                                    <button>
                                        <i class="icon-magnifier"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="sidebar-widget shop-sidebar-border mb-35 pt-40">
                            <h4 class="sidebar-widget-title">Categories </h4>
                            <div class="shop-catigory">
                                <ul>
                                    @php
                                        $categorys = App\Models\Category::all();
                                    @endphp
                                    @foreach($categorys as $category)
                                    @php
                                        $countcategory = App\Models\Product::countcategory($category->id);
                                    @endphp
                                    <li><a class="categoryswe" offercategory="{{$category->id}}">{{$category->en_name}} <span style="float: right">{{$countcategory}}</span> </a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget shop-sidebar-border mb-40 pt-40">
                            <h4 class="sidebar-widget-title">Refine By </h4>
                            <div class="sidebar-widget-list">
                                @php
                                    $stocks = App\Models\Stock::all();
                                @endphp
                                @foreach($stocks as $stock)
                                @php
                                    $countstock = App\Models\Product::countstock($stock->id);
                                @endphp
                                <ul>
                                    <li>
                                        <div class="sidebar-widget-list-left">
                                            <input class="showstock" offerstock="{{$stock->id}}" type="checkbox"> <a class="showstock" offerstock="{{$stock->id}}">{{$stock->en_name}} <span>{{$countstock}}</span> </a>
                                            <span class="checkmark"></span>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget shop-sidebar-border mb-40 pt-40">
                            <h4 class="sidebar-widget-title">Size </h4>
                            <div class="sidebar-widget-list">
                                <ul>
                                    @php
                                        $sizes = App\Models\Size::all();
                                    @endphp
                                    @foreach($sizes as $size)
                                    @php
                                        $countsize =App\Models\Product::countsize($size->id);
                                    @endphp
                                    <li>
                                        <div class="sidebar-widget-list-left">
                                            <input type="checkbox" class="size" offersize="{{$size->id}}" value=""> <a class="size" offersize="{{$size->id}}">{{$size->en_name}}<span>{{$countsize}}</span> </a>
                                            <span class="checkmark"></span>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget shop-sidebar-border mb-40 pt-40">
                            <h4 class="sidebar-widget-title">Color </h4>
                            <div class="sidebar-widget-list">
                                <ul>
                                    @php
                                        $colors = App\Models\Color::all();
                                    @endphp
                                    @foreach($colors as $color)
                                    @php
                                        $colorcount = App\Models\Product::colorcount($color->id);
                                    @endphp
                                    <li>
                                        <div class="sidebar-widget-list-left">
                                            <input type="checkbox" class="showcolor" offercolor="{{$color->id}}" value=""> <a class="showcolor" offercolor="{{$color->id}}">{{$color->en_name}} <span>{{$colorcount}}</span> </a>
                                            <span class="checkmark"></span>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget shop-sidebar-border pt-40">
                            <h4 class="sidebar-widget-title">Popular Tags</h4>
                            <div class="tag-wrap sidebar-widget-tag">
                                @php
                                    $subcategorys = App\Models\SubCategory::all();
                                @endphp
                                @foreach($subcategorys as $subcategory)
                                <a class="subcategory" offersubcategory="{{$subcategory->id}}">{{$subcategory->en_name}}</a>
                                @endforeach
                            </div>
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
$(document).on('click','.subcategory',function(e){
    e.preventDefault();
    var offrsubcatego = $(this).attr('offersubcategory');
    $.ajax({
        type:"get",
        url:"/subcategory/"+offrsubcatego,
        success:function(res)
        {
            if(res)
            {
                $('#showsortby').html(res);
            }
        }
    });
});
$(document).on('click','.size',function(e){
    e.preventDefault();
    var offersize = $(this).attr('offersize');
    $.ajax({
        type:"get",
        url:"/size/"+offersize,
        success:function(res)
        {
            if(res)
            {
                $('#showsortby').html(res);
            }
        }
    });
});
$(document).on('click','.showcolor',function(e){
    e.preventDefault();
    var offercolor = $(this).attr('offercolor');
    $.ajax({
        type:"get",
        url:"/color/"+offercolor,
        success:function(res)
        {
            if(res)
            {
                $('#showsortby').html(res);
            }
        }
    });
});
$(document).on('change','#sort_by',function(e){
    e.preventDefault();
    var sort_by = $('#sort_by').val();
    $.ajax({
        type:"get",
        url:"/sort_by",
        data:{sort_by:sort_by},
        success:function(res)
        {
            if(res)
            {
                $('#showsortby').html(res);
            }
        }
    });
});
$(document).on('click','.categoryswe',function(e){
    e.preventDefault();
    var offercae = $(this).attr('offercategory');
    $.ajax({
        type:"get",
        url:"/category/"+offercae,
        success:function(res)
        {
            if(res)
            {
                $('#showsortby').html(res);
            }
        }
    })
});
$(document).on('click','.showstock',function(e){
    e.preventDefault();
    var offerston = $(this).attr('offerstock');
    $.ajax({
        type:"get",
        url:"/stock/"+offerston,
        success:function(res)
        {
            if(res)
            {
                $('#showsortby').html(res);
            }
        }
    })
});
$(document).on('click','.addnewcart',function(e){
e.preventDefault();
var offervalu= $(this).val();
$.ajax({
    type:"post",
    url:"/carts/"+offervalu,
    data:{
        'id' : offervalu,
        '_token' : "{{csrf_token()}}",
    },
    success:function(res)
    {
        if(res)
        {
            $('#showcount').load(location.href + " #showcount");
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.sms);
        }
    }
});
});
$(document).on('click','.addnewwithlis',function(e){
    e.preventDefault();
    var offerwihlis = $(this).val();
    $.ajax({
        type:"post",
        url:"/wishlisstores/"+offerwihlis,
        data:{
            'id' : offerwihlis,
            '_token' : "{{csrf_token()}}",
        },
        success:function(res)
    {
        if(res)
        {
            $('#showwishlist').load(location.href + " #showwishlist");
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.sms);
        }
    }
    })
})
        });
    </script>
@endsection