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
                <a href="{{route('prodectdatils',$shop->id)}}">
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
                        @php
                        $avarage = $shop->review->average('review');
                    @endphp
                    @for ($i=0; $i<5; $i++)
                    @if ($avarage>$i)
                    <i class="icon_star"></i>
                    @else
                    <i class="icon_star gray"></i> 
                    @endif 
                 @endfor
                    </div>
                    <span>({{$shop->review->count()}})</span>
                </div>
                <h3><a href="{{route('prodectdatils',$shop->id)}}">{{$shop->en_name}}</a></h3>
                <div class="product-price-2">
                    <span>L.E{{$shop->new_price}}</span>
                </div>
            </div>
            <div class="product-content-wrap-2 product-content-position text-center">
                <div class="product-rating-wrap">
                    <div class="product-rating">
                        @php
                            $avarage = $shop->review->average('review');
                        @endphp
                        @for ($i=0; $i<5; $i++)
                        @if ($avarage>$i)
                        <i class="icon_star"></i>
                        @else
                        <i class="icon_star gray"></i> 
                        @endif 
                     @endfor
                    </div>
                    <span>({{$shop->review->count()}})</span>
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
