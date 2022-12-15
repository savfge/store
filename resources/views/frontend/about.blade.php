@extends('layouts.home')
@section('content')
<div class="breadcrumb-area bg-gray">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="{{route('home')}}">Home</a>
                </li>
                <li class="active">about us </li>
            </ul>
        </div>
    </div>
</div>
<div class="about-us-area pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="about-us-logo">
                    <img src="{{asset('assets/images/about/logo.png')}}" alt="logo">
                </div>
            </div>
            @foreach($abouts as $about)
            <div class="col-lg-9 col-md-9">
                <div class="about-us-content">
                    <h3>{{$about->name}}</h3>
                    <p>{{$about->desc}}<br><br></p>
                    <div class="signature">
                        <h2>{{$about->title}}</h2>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="service-area pb-120">
    <div class="container">
        <div class="service-wrap-border service-wrap-padding-3">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 service-border-1">
                    <div class="single-service-wrap-2 mb-30">
                        <div class="service-icon-2 icon-red">
                            <i class="icon-cursor"></i>
                        </div>
                        <div class="service-content-2">
                            <h3>Free Shipping</h3>
                            <p>Oders over $99</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 service-border-1 service-border-1-none-md">
                    <div class="single-service-wrap-2 mb-30">
                        <div class="service-icon-2 icon-red">
                            <i class="icon-refresh "></i>
                        </div>
                        <div class="service-content-2">
                            <h3>90 Days Return</h3>
                            <p>For any problems</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 service-border-1">
                    <div class="single-service-wrap-2 mb-30">
                        <div class="service-icon-2 icon-red">
                            <i class="icon-credit-card "></i>
                        </div>
                        <div class="service-content-2">
                            <h3>Secure Payment</h3>
                            <p>100% Guarantee</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="single-service-wrap-2 mb-30">
                        <div class="service-icon-2 icon-red">
                            <i class="icon-earphones "></i>
                        </div>
                        <div class="service-content-2">
                            <h3>24h Support</h3>
                            <p>Dedicated support</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="banner-area pb-85">
    <div class="container">
        <div class="row">
            @foreach($aboutsimge as $aboutsimges)
            <div class="col-lg-6 col-md-6">
                <div class="banner-wrap mb-30">
                    <div class="banner-img banner-img-zoom">
                        <a href="product-details.html"><img src="{{asset('admin_panel/img/'.$aboutsimges->image)}}" alt=""></a>
                    </div>
                    <div class="banner-content-11 banner-content-11-modify">
                        <h2><span>Zara</span> Pattern Boxed <br>Underwear</h2>
                        <p>Stretch, & Fress cool</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="team-area pb-90">
    <div class="container">
        <div class="section-title mb-45 text-center">
            <h2>Team Members</h2>
        </div>
        <div class="row">
            @foreach($teams as $team)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="team-wrapper mb-30">
                    <div class="team-img">
                        <img src="{{asset('admin_panel/img/'.$team->image)}}" style="width:300px; height:300px;" alt="">
                        <div class="team-action">
                            <a class="facebook" href="">
                                <i class="social_facebook"></i>
                            </a>
                            <a class="twitter" href="#">
                                <i class="social_twitter"></i>
                            </a>
                            <a class="instagram" href="#">
                                <i class="social_instagram"></i>
                            </a>
                        </div>
                    </div>
                    <div class="team-content text-center">
                        <h4>{{$team->name}}</h4>
                        <span>{{$team->title}} </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="testimonial-area bg-gray-3 pt-115 pb-115">
    <div class="container">
        <div class="section-title mb-45 text-center">
            <h2>Testimonials</h2>
        </div>
        <div class="testimonial-active-2 dot-style-2 dot-style-2-position-static">
            @foreach($teatmtion as $teatmtio)
            <div class="single-testimonial-2 text-center">
                <div class="testimonial-img">
                    <img alt="" src="{{asset('admin_panel/img/'.$teatmtio->image)}}" style="width: 100px;height:100px;">
                </div>
                <p>{{$teatmtio->desc}}<br><br>.</p>
                <div class="client-info">
                    <h5>{{$teatmtio->name}}</h5>
                    <span>{{$teatmtio->title}}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection