@extends('layouts.home')
@section('silder')
<div class="slider-area">
    <div class="hero-slider-active-1 nav-style-1 dot-style-2 dot-style-2-position-2 dot-style-2-active-black">
        @foreach($silders as $silder)
        <div class="single-hero-slider single-animation-wrap slider-height-2 custom-d-flex custom-align-item-center bg-img hm2-slider-bg res-white-overly-xs" style="background-image:url({{asset('admin_panel/img/'.$silder->image)}});">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-slider-content-4 slider-animated-1">
                            <h4 class="animated">{{$silder->en_name}}</h4>
                            <h1 class="animated">Denim Mixed <br>Layering Combine <br>collect</h1>
                            <p class="animated">{{$silder->en_desc}}<br><br></p>
                            <div class="btn-style-1">
                                <a class="animated btn-1-padding-1" href="product-details.html">{{__('Explore Now')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
@section('content')
<div class="product-area pt-115 pb-80">
    <div class="container">
        <div class="section-title-tab-wrap mb-55">
            <div class="section-title-4">
                <h2>Best-Seller Products</h2>
            </div>
        </div>
        <div class="tab-content jump">
            <div id="product-1" class="tab-pane active">
                <div class="row">
                    @php
                        $shopman = App\Models\Product::where('staus',1)->orderBy('id','Desc')->paginate('4');
                    @endphp
                    @php
                    $washile = Cart::instance('wishlist')->content()->pluck('id');
                @endphp
                 @php
                 $cartdew = Cart::instance('cart')->content()->pluck('id');
             @endphp
                    @foreach( $shopman as  $shopma)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-15">
                                <a href="product-details.html">
                                    <img src="{{asset('admin_panel/img/'.$shopma->image)}}" width="300" height="300" alt="">
                                </a>
                                <div class="product-action-2 tooltip-style-2">
                                    @if ($washile->contains($shopma->id))
                                    <button title="Wishlist" style="color:orange"><i style="color:orange" class="icon-heart"></i></button>  
                                    @else
                                    <button title="Wishlist" value="{{$shopma->id}}" class="addnewwish"><i class="icon-heart"></i></button>  
                                    @endif
                                    <button title="Compare"><i class="icon-refresh"></i></button>
                                </div>
                            </div>
                            <div class="product-content-wrap-2 text-center">
                                <div class="product-rating-wrap">
                                    <div class="product-rating">
                                        @php
                                        $avarage = $shopma->review->average('review');
                                        @endphp
                                        @for ($i=0;$i<5;$i++)
                                            @if ($avarage>$i)
                                            <i class="icon_star"></i>  
                                            @else
                                            <i class="icon_star gray"></i>  
                                            @endif
                                        @endfor
                                    </div>
                                    <span>({{$shopma->review->count()}})</span>
                                </div>
                                <h3><a href="{{route('prodectdatils',$shopma->id)}}">{{$shopma->en_name}}</a></h3>
                                <div class="product-price-2">
                                    <span>L.E{{$shopma->new_price}}</span>
                                </div>
                            </div>
                            <div class="product-content-wrap-2 product-content-position text-center">
                                <div class="product-rating-wrap">
                                    <div class="product-rating">
                                        @php
                                        $avarage = $shopma->review->average('review');
                                        @endphp
                                        @for ($i=0;$i<5;$i++)
                                            @if ($avarage>$i)
                                            <i class="icon_star"></i>  
                                            @else
                                            <i class="icon_star gray"></i>  
                                            @endif
                                        @endfor
                                    </div>
                                    <span>({{$shopma->review->count()}})</span>
                                </div>
                                <h3><a href="{{route('prodectdatils',$shopma->id)}}">{{$shopma->en_name}}</a></h3>
                                <div class="product-price-2">
                                    <span>L.E{{$shopma->new_price}}</span>
                                </div>
                                <div class="pro-add-to-cart">
                                    @if ($cartdew->contains($shopma->id))
                                    <button  title="Add to Cart">Add To Cart</button>   
                                    @else
                                    <button value="{{$shopma->id}}" class="addnewcart" title="Add to Cart">Add To Cart</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @php
                        $shopman = App\Models\Product::where('staus',2)->orderBy('id','Desc')->paginate('4');
                    @endphp
                    @php
                    $washile = Cart::instance('wishlist')->content()->pluck('id');
                @endphp
                 @php
                 $cartdew = Cart::instance('cart')->content()->pluck('id');
             @endphp
                    @foreach( $shopman as  $shopma)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-15">
                                <a href="product-details.html">
                                    <img src="{{asset('admin_panel/img/'.$shopma->image)}}" width="300" height="300" alt="">
                                </a>
                                <div class="product-action-2 tooltip-style-2">
                                    @if ($washile->contains($shopma->id))
                                    <button title="Wishlist" style="color:orange"><i style="color:orange" class="icon-heart"></i></button>  
                                    @else
                                    <button title="Wishlist" value="{{$shopma->id}}" class="addnewwish"><i class="icon-heart"></i></button>  
                                    @endif
                                    <button title="Compare"><i class="icon-refresh"></i></button>
                                </div>
                            </div>
                            <div class="product-content-wrap-2 text-center">
                                <div class="product-rating-wrap">
                                    <div class="product-rating">
                                        @php
                                        $avarage = $shopma->review->average('review');
                                        @endphp
                                        @for ($i=0;$i<5;$i++)
                                            @if ($avarage>$i)
                                            <i class="icon_star"></i>  
                                            @else
                                            <i class="icon_star gray"></i>  
                                            @endif
                                        @endfor
                                    </div>
                                    <span>({{$shopma->review->count()}})</span>
                                </div>
                                <h3><a href="{{route('prodectdatils',$shopma->id)}}">{{$shopma->en_name}}</a></h3>
                                <div class="product-price-2">
                                    <span>L.E{{$shopma->new_price}}</span>
                                </div>
                            </div>
                            <div class="product-content-wrap-2 product-content-position text-center">
                                <div class="product-rating-wrap">
                                    <div class="product-rating">
                                        @php
                                        $avarage = $shopma->review->average('review');
                                        @endphp
                                        @for ($i=0;$i<5;$i++)
                                            @if ($avarage>$i)
                                            <i class="icon_star"></i>  
                                            @else
                                            <i class="icon_star gray"></i>  
                                            @endif
                                        @endfor
                                    </div>
                                    <span>({{$shopma->review->count()}})</span>
                                </div>
                                <h3><a href="{{route('prodectdatils',$shopma->id)}}">{{$shopma->en_name}}</a></h3>
                                <div class="product-price-2">
                                    <span>L.E{{$shopma->new_price}}</span>
                                </div>
                                <div class="pro-add-to-cart">
                                    @if ($cartdew->contains($shopma->id))
                                    <button  title="Add to Cart">Add To Cart</button>   
                                    @else
                                    <button value="{{$shopma->id}}" class="addnewcart" title="Add to Cart">Add To Cart</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('bunner')
<div class="banner-area section-padding-2 pb-85">
    <div class="container-fluid">
        <div class="row">
            @php
                $shops = App\Models\Silder::where('staus',3)->orderBy('id', 'DESC')->paginate();
            @endphp
            @foreach($shops as $shop)
            <div class="col-lg-6">
                <div class="banner-wrap mb-30">
                    <div class="banner-img banner-img-zoom">
                        <a href="product-details.html"><img src="{{asset('admin_panel/img/'.$shop->image)}}" width="370" height="370" alt=""></a>
                    </div>
                    <div class="banner-content-9">
                        <span>{{$shop->en_name}} <br></span>
                        <h2>Minimalist <br>Blazer</h2>
                        <p>{{$shop->en_desc}}<br><br></p>
                        <div class="btn-style-1">
                            <a class="btn-1-padding-3 bg-white banner-btn-res" href="{{route('shop')}}">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
@section('shop')
<div class="product-area" >
    <div class="container">
        <div class="border-bottom-7 hm4-pb-100">
            <div class="section-title-tab-wrap mb-55">
                <div class="section-title-4">
                    <h2>new arrivals</h2>
                </div>
                <div class="tab-btn-wrap-2" >
                    <div class="tab-style-5 nav">
                        <a class="active" href="#product-6" data-toggle="tab">{{__('All')}} </a>
                        @lang('en')
                        @foreach($categorys as $category)
                        <a href="#tab{{$category->id}}" data-toggle="tab"> {{$category->en_name}} </a>
                        @endforeach
                        @else
                        @foreach($categorys as $category)
                        <a href="#tab{{$category->id}}" data-toggle="tab"> {{$category->ar_name}} </a>
                        @endforeach
                        @endlang
                    </div>
                    <div class="btn-style-6 ml-60">
                        <a href="{{route('shop')}}">All Product</a>
                    </div>
                </div>
            </div>
            <div class="tab-content jump">
                @php
                    $prodects = App\Models\Product::all();
                @endphp
                <div id="product-6" class="tab-pane active">
                    <div class="product-slider-active-4 nav-style-4">
                        @php
                            $washile = Cart::instance('wishlist')->content()->pluck('id');
                        @endphp
                         @php
                         $cartdew = Cart::instance('cart')->content()->pluck('id');
                     @endphp
                        @foreach($prodects as $prodect)
                        
                        <div class="product-plr-1">
                            <div class="single-product-wrap mb-35">
                                <div class="product-img product-img-zoom mb-15">
                                    <a href="{{route('prodectdatils',$prodect->id)}}">
                                        <img src="{{asset('admin_panel/img/'.$prodect->image)}}" width="300" height="300" alt="">
                                    </a>
                                    <div class="product-action-2 tooltip-style-2">
                                        @if ($washile->contains($prodect->id))
                                        <button title="Wishlist" style="color:orange"><i style="color:orange" class="icon-heart"></i></button>  
                                        @else
                                        <button title="Wishlist" value="{{$prodect->id}}" class="addnewwish"><i class="icon-heart"></i></button>  
                                        @endif
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
                                    <h3><a href="{{route('prodectdatils',$prodect->id)}}">{{$prodect->en_name}}</a></h3>
                                    <div class="product-price-2">
                                        <span>L.E{{$prodect->old_price}}</span>
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
                                    <h3><a href="{{route('prodectdatils',$prodect->id)}}">{{$prodect->en_name}}</a></h3>
                                    <div class="product-price-2">
                                        <span>L.E{{$prodect->new_price}}</span>
                                    </div>
                                    <div class="pro-add-to-cart">
                                        @if ($cartdew->contains($prodect->id))
                                        <button  title="Add to Cart">Add To Cart</button>   
                                        @else
                                        <button value="{{$prodect->id}}" class="addnewcart" title="Add to Cart">Add To Cart</button>
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @foreach($categorys as $category)
                @php
                    $prodects = App\Models\Product::where('category_id',$category->id)->get();
                @endphp
                <div id="tab{{$category->id}}" class="tab-pane">
                    <div class="product-slider-active-4 nav-style-4">
                        @php
                            $washile = Cart::instance('wishlist')->content()->pluck('id');
                        @endphp
                        @php
                            $cartdew = Cart::instance('cart')->content()->pluck('id');
                        @endphp
                        @foreach($prodects as $prodect)
                        <div class="product-plr-1">
                            <div class="single-product-wrap mb-35">
                                <div class="product-img product-img-zoom mb-15">
                                    <a href="{{route('prodectdatils',$prodect->id)}}">
                                        <img src="{{asset('admin_panel/img/'.$prodect->image)}}" width="300" height="300" alt="">
                                    </a>
                                    <div class="product-action-2 tooltip-style-2">
                                        @if ($washile->contains($prodect->id))
                                        <button title="Wishlist" style="color:orange"><i style="color:orange" class="icon-heart"></i></button>  
                                        @else
                                        <button title="Wishlist" value="{{$prodect->id}}" class="addnewwish"><i class="icon-heart"></i></button>  
                                        @endif
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
                                    <h3><a href="{{route('prodectdatils',$prodect->id)}}">{{$prodect->en_name}}</a></h3>
                                    <div class="product-price-2">
                                        <span>L.E{{$prodect->old_price}}</span>
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
                                    <h3><a href="{{route('prodectdatils',$prodect->id)}}">{{$prodect->en_name}}</a></h3>
                                    <div class="product-price-2">
                                        <span>L.E{{$prodect->new_price}}</span>
                                    </div>
                                    <div class="pro-add-to-cart">
                                        @if ($cartdew->contains($prodect->id))
                                        <button   title="Add to Cart">Add To Cart</button>   
                                        @else
                                        <button value="{{$prodect->id}}" class="addnewcart" title="Add to Cart">Add To Cart</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@section('blog')
<div class="blog-area pt-115 pb-75">
    <div class="container">
        <div class="section-title-tab-wrap mb-55">
            <div class="section-title-4">
                <h2>press & looks</h2>
            </div>
            <div class="btn-style-6 ml-60">
                <a href="blog-details.html">All articles</a>
            </div>
        </div>
        <div class="row">
            @php
                $blogs = App\Models\Blog::paginate('3');
            @endphp
            @foreach($blogs as $blog)
            <div class="col-lg-4 col-md-6">

                <div class="blog-wrap mb-30">
                    <div class="blog-img mb-25">
                        <a href="{{route('blogs',$blog->id)}}"><img src="{{asset('admin_panel/img/'.$blog->image)}}" width="250" height="250" alt="blog-img"></a>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <ul>
                                <li><a href="{{route('blogs',$blog->id)}}">Comment: {{$blog->commentse->count()}}</a></li>
                                <li>{{\Carbon\Carbon::parse($blog->created_at)->format('D , d M Y')}}</li>
                            </ul>
                        </div>
                        <h3><a href="{{route('blogs',$blog->id)}}">{{$blog->name}}</a></h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
<script src="{{asset('jquery-3.6.0.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).on('click','.addnewwish',function(e){
    e.preventDefault();
    var valuewis = $(this).val();
    $.ajax({
        type:"post",
        url:"/wishlisstores/"+valuewis,
        data:{
            'id' : valuewis,
            '_token' : "{{csrf_token()}}",
        },
        success:function(res)
        {
            if(res)
            {
                $('#showwishlist').load(location.href + " #showwishlist");
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.sms);
                window.location.href ="/wishlist";
                
            }
        }
    });
});
$(document).on('click','.addnewcart',function(e){
    e.preventDefault();
    var offercart = $(this).val();
    $.ajax({
        type:'post',
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
    });
});
    });
</script>