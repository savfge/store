@extends('layouts.home')
@section('content')
<div class="breadcrumb-area bg-gray">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li class="active">product details </li>
            </ul>
        </div>
    </div>
</div>

<div class="product-details-area pt-120 pb-115">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product-details-tab">
                    <div class="pro-dec-big-img-slider">
                        <div class="easyzoom-style">
                            <div class="easyzoom easyzoom--overlay">
                                <a href="{{asset('admin_panel/img/'.$proddect->image)}}">
                                    <img src="{{asset('admin_panel/img/'.$proddect->image)}}" alt="">
                                </a>
                            </div>
                            <a class="easyzoom-pop-up img-popup" href="{{asset('admin_panel/img/'.$proddect->image)}}"><i class="icon-size-fullscreen"></i></a>
                        </div>
                        <div class="easyzoom-style">
                            <div class="easyzoom easyzoom--overlay">
                                <a href="assets/images/product-details/b-large-2.jpg">
                                    <img src="assets/images/product-details/large-2.jpg" alt="">
                                </a>
                            </div>
                            <a class="easyzoom-pop-up img-popup" href="assets/images/product-details/b-large-2.jpg"><i class="icon-size-fullscreen"></i></a>
                        </div>
                        <div class="easyzoom-style">
                            <div class="easyzoom easyzoom--overlay">
                                <a href="assets/images/product-details/b-large-3.jpg">
                                    <img src="assets/images/product-details/large-3.jpg" alt="">
                                </a>
                            </div>
                            <a class="easyzoom-pop-up img-popup" href="assets/images/product-details/b-large-3.jpg"><i class="icon-size-fullscreen"></i></a>
                        </div>
                        <div class="easyzoom-style">
                            <div class="easyzoom easyzoom--overlay">
                                <a href="assets/images/product-details/b-large-4.jpg">
                                    <img src="assets/images/product-details/large-4.jpg" alt="">
                                </a>
                            </div>
                            <a class="easyzoom-pop-up img-popup" href="assets/images/product-details/b-large-4.jpg"><i class="icon-size-fullscreen"></i></a>
                        </div>
                        <div class="easyzoom-style">
                            <div class="easyzoom easyzoom--overlay">
                                <a href="assets/images/product-details/b-large-2.jpg">
                                    <img src="assets/images/product-details/large-2.jpg" alt="">
                                </a>
                            </div>
                            <a class="easyzoom-pop-up img-popup" href="assets/images/product-details/b-large-2.jpg"><i class="icon-size-fullscreen"></i></a>
                        </div>
                    </div>
                    <div class="product-dec-slider-small product-dec-small-style1">
                        <div class="product-dec-small active">
                            <img src="assets/images/product-details/small-1.jpg" alt="">
                        </div>
                        <div class="product-dec-small">
                            <img src="assets/images/product-details/small-2.jpg" alt="">
                        </div>
                        <div class="product-dec-small">
                            <img src="assets/images/product-details/small-3.jpg" alt="">
                        </div>
                        <div class="product-dec-small">
                            <img src="assets/images/product-details/small-4.jpg" alt="">
                        </div>
                        <div class="product-dec-small">
                            <img src="assets/images/product-details/small-2.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product-details-content pro-details-content-mrg">
                    <h2>{{$proddect->en_name}}</h2>
                    <div class="product-ratting-review-wrap showreview">
                        <div class="product-ratting-digit-wrap">
                            <div class="product-ratting" >
                                @php
                                    $avaragee = $proddect->review->average('review');
                                @endphp
                                @for ($i=0;$i<5;$i++)
                                    @if ($avaragee>$i)   
                                    <i class="icon_star"></i>                                     
                                    @else
                                    <i class="icon_star" style="color:darkgray"></i>  
                                    @endif
                                @endfor
                            </div>
                            
                            <div class="product-digit">
                                @php
                                    $avarage = $proddect->review->average('review');
                                @endphp
                                <span>{{$avarage}}</span>
                            </div>
                        </div>
                        <div class="product-review-order">
                            <span>{{$proddect->review->count()}} Reviews</span>
                            <span>242 orders</span>
                        </div>
                    </div>
                    <p>{{$proddect->short_desc}}<br><br></p>
                    <div class="pro-details-price">
                        <span class="new-price">L.E{{$proddect->new_price}}</span>
                        <span class="old-price">L.E{{$proddect->old_price}}</span>
                    </div>
                    <div class="pro-details-quality">
                        <form method="POST" enctype="multipart/form-data" id="formccaart">
                            @csrf
                        <span>Quantity:</span>
                        <div class="cart-plus-minus">
                            <input class="cart-plus-minus-box" type="text" name="qtybutton" readonly value="0" min="0" max="30">
                        </div>
                        <input type="hidden" name="prodect_id" value="{{$proddect->id}}">
                    </div>
                    <div class="product-details-meta">
                        <ul>
                            <li><span>Categories:</span> <a href="#">{{$proddect->category->en_name}},</a> <a href="#"></a> <a href="#"></a></li>
                            <li><span>Tag: </span> <a href="#">{{$proddect->subcategory->en_name}},</a> <a href="#"></a> <a href="#"></a></li>
                        </ul>
                    </div>
                    <div class="pro-details-action-wrap">
                        <div class="pro-details-add-to-cart">
                            <a title="Add to Cart" class="addnewcart" offercart="{{$proddect->id}}">Add To Cart </a>
                        </div>
                    </form>
                        <div class="pro-details-action">
                            <a title="Add to Wishlist" href="#"><i class="icon-heart"></i></a>
                            <a title="Add to Compare" href="#"><i class="icon-refresh"></i></a>
                            <a class="social" title="Social" href="#"><i class="icon-share"></i></a>
                            <div class="product-dec-social">
                                <a class="facebook" title="Facebook" href="#"><i class="icon-social-facebook"></i></a>
                                <a class="twitter" title="Twitter" href="#"><i class="icon-social-twitter"></i></a>
                                <a class="instagram" title="Instagram" href="#"><i class="icon-social-instagram"></i></a>
                                <a class="pinterest" title="Pinterest" href="#"><i class="icon-social-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="description-review-wrapper pb-110">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="dec-review-topbar nav mb-45">
                    <a class="active" data-toggle="tab" href="#des-details1">Description</a>
                    <a data-toggle="tab" href="#des-details2">Specification</a>
                    <a data-toggle="tab" href="#des-details3">Meterials </a>
                    <a data-toggle="tab" href="#des-details4">Reviews and Ratting </a>
                </div>
                <div class="tab-content dec-review-bottom">
                    <div id="des-details1" class="tab-pane active">
                        <div class="description-wrap">
                            <p>{{$proddect->long_desc}}<br><br></p>
                        </div>
                    </div>
                    <div id="des-details2" class="tab-pane">
                        <div class="specification-wrap table-responsive">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="title width1">Name</td>
                                        <td>{{$proddect->en_name}}</td>
                                    </tr>
                                    <tr>
                                        <td class="title width1">Models</td>
                                        <td>FX 829 v1</td>
                                    </tr>
                                    <tr>
                                        <td class="title width1">Categories</td>
                                        <td>{{$proddect->category->en_name}}</td>
                                    </tr>
                                    <tr>
                                        <td class="title width1">Size</td>
                                        <td>{{$proddect->size->en_name}}</td>
                                    </tr>
                                    <tr>
                                        <td class="title width1">Stock </td>
                                        <td>{{$proddect->stock->en_name}}</td>
                                    </tr>
                                    <tr>
                                        <td class="title width1">Color</td>
                                        <td>{{$proddect->color->en_name}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="des-details3" class="tab-pane">
                        <div class="specification-wrap table-responsive">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="title width1">Top</td>
                                        <td>Cotton Digital Print Chain Stitch Embroidery Work</td>
                                    </tr>
                                    <tr>
                                        <td class="title width1">Bottom</td>
                                        <td>Cotton Cambric</td>
                                    </tr>
                                    <tr>
                                        <td class="title width1">Dupatta</td>
                                        <td>Digital Printed Cotton Malmal With Chain Stitch</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="des-details4" class="tab-pane">
                        <div class="review-wrapper">
                            <h2>1 review for Sleeve Button Cowl Neck</h2>
                            @foreach($proddect->review as $revier)
                            <div class="single-review">
                                <div class="review-img">
                                    <img src="{{asset('assets/images/product-details/client-1.png')}}" alt="">
                                </div>
                                <div class="review-content">
                                    <div class="review-top-wrap">
                                        <div class="review-name">
                                            <h5><span>{{$revier->name}}</span> - {{\Carbon\Carbon::parse($revier->create_at)->format('M , Y D')}}</h5>
                                        </div>
                                        <div class="review-rating">
                                            @for ($i=0;$i<5;$i++)
                                                @if ($revier->review >$i)
                                                <i class="yellow icon_star"></i>   
                                                @else
                                                <i class="yellow icon_star" style="color:aliceblue"></i>  
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                    <p>{{$revier->comment}}<br><br></p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="ratting-form-wrapper">
                            <span>Add a Review</span>
                            <p>Your email address will not be published. Required fields are marked <span>*</span></p>
                            <div class="ratting-form">
                                <form enctype="multipart/form-data" id="formprodects" method="post">
                                    @csrf
                                    <input type="hidden" name="prodect_id" value="{{$proddect->id}}">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="rating-form-style mb-20">
                                                <label>Name <span>*</span></label>
                                                <input type="text" name="name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="rating-form-style mb-20">
                                                <label>Email <span>*</span></label>
                                                <input type="email" name="email">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="rating-form-style mb-20">
                                                <label>Your review <span>*</span></label>
                                                <input type="number" min="0" max="5" name="review" >
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="rating-form-style mb-20">
                                                <label>Your Comment <span>*</span></label>
                                                <textarea name="comment"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-submit">
                                                <input type="button" class="addnewrerf" value="Submit">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="related-product pb-115">
    <div class="container">
        <div class="section-title mb-45 text-center">
            <h2>Related Product</h2>
        </div>
        <div class="related-product-active">
            @foreach($prodectmanre as $prodectmanr)
            <div class="product-plr-1">
                <div class="single-product-wrap">
                    <div class="product-img product-img-zoom mb-15">
                        <a href="{{route('prodectdatils',$prodectmanr->id)}}">
                            <img src="{{asset('admin_panel/img/'.$prodectmanr->image)}}" width="300" height="300" alt="">
                        </a>
                        <div class="product-action-2 tooltip-style-2">
                            <button title="Wishlist"><i class="icon-heart"></i></button>
                            <button title="Quick View" data-toggle="modal" data-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                            <button title="Compare"><i class="icon-refresh"></i></button>
                        </div>
                    </div>
                    <div class="product-content-wrap-2 text-center">
                        <div class="product-rating-wrap">
                            <div class="product-rating">
                                @php
                                    $avarage = $prodectmanr->review->average('review');
                                @endphp
                                @for ($i=0;$i<5;$i++)
                                  @if ($avarage>$i)
                                  <i class="icon_star"></i>   
                                  @else
                                  <i class="icon_star gray"></i>  
                                  @endif  
                                @endfor
                               
                            </div>
                            
                            <span>({{$prodectmanr->review->count()}})</span>
                        </div>
                        <h3><a href="{{route('prodectdatils',$prodectmanr->id)}}">{{$prodectmanr->en_name}}</a></h3>
                        <div class="product-price-2">
                            <span>L.E{{$prodectmanr->new_price}}</span>
                        </div>
                    </div>
                    <div class="product-content-wrap-2 product-content-position text-center">
                        <div class="product-rating-wrap">
                            <div class="product-rating">
                                @php
                                    $avarage = $prodectmanr->review->average('review');
                                @endphp
                                @for ($i=0;$i<5;$i++)
                                  @if ($avarage>$i)
                                  <i class="icon_star"></i>   
                                  @else
                                  <i class="icon_star gray"></i>  
                                  @endif  
                                @endfor
                            </div>
                            
                            <span>({{$prodectmanr->review->count()}})</span>
                        </div>
                        <h3><a href="{{route('prodectdatils',$prodectmanr->id)}}">{{$prodectmanr->en_name}}</a></h3>
                        <div class="product-price-2">
                            <span>L.E{{$prodectmanr->new_price}}</span>
                        </div>
                        <div class="pro-add-to-cart">
                            <button title="Add to Cart">Add To Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
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
$(document).on('click','.addnewcart',function(e){
    e.preventDefault();
    var formdata = new FormData($('#formccaart')[0]);
    $.ajax({
        type:"post",
        url:"/cartstores",
        enctype:"multipart/form-data",
        data:formdata,
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                $('#showcount').load(location.href + " #showcount");
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.sms);
            }
        }
    })
});
$(document).on('click','.addnewrerf',function(e){
    e.preventDefault();
    var fornprotrew = new FormData($('#formprodects')[0]);
    $.ajax({
        type:"post",
        url:"/reviewstores",
        enctype:"multipart/form-data",
        data:fornprotrew,
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                $('.showreview').load(location.href + " .showreview");
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.sms);
                window.location.reload();
            }
        }
    })
});
    });
</script>
@endsection
{{-- addnewcart --}}