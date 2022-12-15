@extends('layouts.home')
@section('content')
<div class="breadcrumb-area bg-gray">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="{{route('home')}}">Home</a>
                </li>
                <li class="active">Contact us </li>
            </ul>
        </div>
    </div>
</div>
<div class="contact-area pt-115 pb-120" id="formdatde">
    <div class="container">
        <div class="contact-info-wrap-3 pb-85">
            <h3>contact info</h3>
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="single-contact-info-3 text-center mb-30">
                        <i class="icon-location-pin "></i>
                        <h4>our address</h4>
                        <p>77 seventh Street, USA. </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="single-contact-info-3 extra-contact-info text-center mb-30">
                        <ul>
                            <li><i class="icon-screen-smartphone"></i> 716-298-1822 </li>
                            <li><i class="icon-envelope "></i> <a href="#"> info@example.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="single-contact-info-3 text-center mb-30">
                        <i class="icon-clock "></i>
                        <h4>openning hour</h4>
                        <p>Monday - Friday. 9:00am - 5:00pm </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="get-in-touch-wrap">
            <h3>Get In Touch</h3>
            <div class="contact-from contact-shadow">
                <form id="contact_form" enctype="multipart/form-data"  method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <input name="name"  type="text" placeholder="Name">
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <input name="email" type="email"  placeholder="Email">
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <input name="subject" type="text" placeholder="Subject">
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <textarea name="message" placeholder="Your Message"></textarea>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <button class="addnewcontant" type="button">Send Message</button>
                        </div>
                    </div>
                </form>
                <p class="form-messege"></p>
            </div>
        </div>
        <div class="contact-map pt-120">
            <div id="map"></div>
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
$(document).on('click','.addnewcontant',function(e){
    e.preventDefault();
    var formdata = new FormData($('#contact_form')[0]);
    $.ajax({
        type:"post",
        url:"/contactstores",
        data:formdata,
        enctype:"multipart/form-data",
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.sms);
                $('#formdatde').load(location.href + " #formdatde");
            }
        }
    })
})
    });
</script>
@endsection