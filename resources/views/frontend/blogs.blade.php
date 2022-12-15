@extends('layouts.home')
@section('content')
<div class="breadcrumb-area bg-gray">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="{{route('home')}}">Home</a>
                </li>
                <li class="active">Blog details</li>
            </ul>
        </div>
    </div>
</div>

<div class="blog-area pt-120 pb-120">
    <div class="container">
        
        <div class="row flex-row-reverse">
            
            <div class="col-lg-9">
                <div id="showblog">
                <div class="blog-details-wrapper">
                    <div class="blog-details-top">
                        <div class="blog-details-img">
                            <img alt="" src="{{asset('admin_panel/img/'.$blog->image)}}">
                        </div>
                        <div class="blog-details-content">
                            <div class="blog-meta-2">
                                <ul>
                                    <li>News</li>
                                    <li>May 25, 2020</li>
                                </ul>
                            </div>
                            <h1>{{$blog->name}}</h1>
                            <p>{{$blog->long_desc}}<br><br></p>
                            <blockquote>Lorem ipsum dolor sit amet, consecte adipisicing elit, sed do eiusmod tempor incididunt labo dolor magna aliqua. Ut enim ad minim veniam quis nostrud.</blockquote>
                            <p>{{$blog->short_desc}}<br><br>.</p>
                        </div>
                    </div>
                    <div class="tag-share">
                        <div class="dec-tag">
                            <ul>
                                <li><a href="#">lifestyle ,</a></li>
                                <li><a href="#">interior ,</a></li>
                                <li><a href="#">outdoor</a></li>
                            </ul>
                        </div>
                        <div class="blog-share">
                            <span>share :</span>
                            <div class="share-social">
                                <ul>
                                    <li>
                                        <a class="facebook" href="#">
                                            <i class="icon-social-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="twitter" href="#">
                                            <i class="icon-social-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="instagram" href="#">
                                            <i class="icon-social-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="next-previous-post">

                        {!! $comments->links() !!}
                    </div>
                    
                    <div class="blog-comment-wrapper mt-55" id="showcomment">
                        <h4 class="blog-dec-title">comments : {{$blog->commentse->count()}}</h4>
                        @foreach($blog->commentse as $item)
                        <div class="single-comment-wrapper mt-35">
                            <div class="blog-comment-img">
                                <img src="{{asset('admin_panel/img/'.Auth::user()->image)}}" alt="">
                            </div>
                            <div class="blog-comment-content">
                                <h4>{{$item->name}}</h4>
                                <span>{{\Carbon\Carbon::parse($item->create_at)->format('D , d M Y')}} </span>
                                <p>{{$item->comment}}<br><br>, </p>
                                <div class="blog-details-btn">
                                    <a href="javascript::void(0)" onclick="replyDev(this)" data-documentId="{{$item->id}}">read more</a>
                                </div>
                            </div>
                        </div>
                        @php
                            $replys = App\Models\Reply::all();
                        @endphp
                        
                        @foreach($replys as $reply)
                        @if ($reply->commnet_id==$item->id)
                        <div class="single-comment-wrapper mt-50 ml-120"  id="showreplynew">
                            <div class="blog-comment-img">
                                <img src="{{asset('assets/images/blog/comment-2.jpg')}}" alt="">
                            </div>
                            <div class="blog-comment-content">
                                <h4>{{$reply->name}}</h4>
                                <span>{{\Carbon\Carbon::parse($reply->created_at)->format('D , d M Y')}} </span>
                                <p>{{$reply->message}}<br><br></p>
                                <div class="blog-details-btn">
                                    {{-- <a href="blog-details.html">read more</a> --}}
                                </div>
                            </div>
                            
                        </div>  
                        @endif
                        @endforeach
                        @endforeach
                        
                        <div class="showreply" style="display: none;">
                        <form id="formdarepy" enctype="multipart/form-data" method="post">
                            @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <input type="text" name="commentId" id="commentId">
                            </div>
                            <div class="col-md-12 mb-3">
                                <textarea type="text" style="width: 100;height:200px;" class="form-control" name="message"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">{{__('Reply Name')}}</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <button class="btn btn-info addnwreplyd">{{__('Add New Reply')}}</button>
                            </div>
                        </div>
                        </div>
                        </form>
                    </div>
                    <div class="blog-reply-wrapper mt-50">
                        <h4 class="blog-dec-title">post a comment</h4>
                        <form class="blog-form" id="formbloge" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="blog_id" value="{{$blog->id}}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="leave-form">
                                        <input type="text" name="name" placeholder="Full Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="leave-form">
                                        <input type="email" name="email" placeholder="Email Address ">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="text-leave">
                                        <textarea placeholder="Message" name="comment"></textarea>
                                        <input type="button" class="addnewcommer" value="POST COMMENT">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-lg-3">
                <div class="sidebar-wrapper sidebar-wrapper-mrg-right">
                    <div class="sidebar-widget mb-40">
                        <h4 class="sidebar-widget-title">Search </h4>
                        <div class="sidebar-search">
                            <form class="sidebar-search-form" action="#">
                                <input type="text" placeholder="Search Post">
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
                                <li><a class="showcategory" offershow="{{$category->id}}">{{$category->en_name}}</a></li>
                                
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-widget shop-sidebar-border mb-40 pt-40">
                        <h4 class="sidebar-widget-title">Recent Posts </h4>
                        <div class="recent-post">
                            @foreach($blogsresent as $blogsresen)
                            <div class="single-sidebar-blog">
                                <div class="sidebar-blog-img">
                                    <a href="blog-details.html"><img src="{{asset('admin_panel/img/'.$blogsresen->image)}}" alt=""></a>
                                </div>
                                <div class="sidebar-blog-content">
                                    <h5><a href="blog-details.html">{{$blogsresen->name}}</a></h5>
                                    <span>
                                    {{\carbon\Carbon::parse($blogsresen->create_at)->format('M , Y D')}}
                                    </span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- <div class="sidebar-widget shop-sidebar-border mb-40 pt-40">
                        <h4 class="sidebar-widget-title">Archives </h4>
                        <div class="archives-wrap">
                            <select>
                                <option>Select Month</option>
                                <option> January 2020 </option>
                                <option> December 2018 </option>
                                <option> November 2018 </option>
                            </select>
                        </div>
                    </div> --}}
                    <div class="sidebar-widget shop-sidebar-border pt-40">
                        <h4 class="sidebar-widget-title">Popular Tags</h4>
                        <div class="tag-wrap sidebar-widget-tag">
                        @php
                            $subcategorys = App\Models\SubCategory::all();
                        @endphp
                        @foreach ($subcategorys as $subcategory)
                            <a class="showsubcateg" offershow="{{$subcategory->id}}">{{$subcategory->en_name}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
function replyDev(caller)
{
    document.getElementById('commentId').value=$(caller).attr('data-documentId');
    $('.showreply').insertAfter($(caller));
    $('.showreply').show();
}
</script>

<script src="{{asset('jquery-3.6.0.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).on('click','.addnewcommer',function(e){
    e.preventDefault();
    var formdata = new FormData($('#formbloge')[0]);
    $.ajax({
        type:"post",
        url:"/commentstroes",
        enctype:"multipart/form-data",
        data:formdata,
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                $('#showcomment').load(location.href + " #showcomment");
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.sms);
            }
        }
        
    });
});
$(document).on('click','.addnwreplyd',function(e){
    e.preventDefault();
    var formdataupde = new FormData($('#formdarepy')[0]);
    $.ajax({
        type:"post",
        url:"/replystroes",
        data:formdataupde,
        processData:false,
        contentType:false,
        cache:false,
        enctype:"multipart/form-data",
        success:function(res)
        {
            if(res)
            {
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.sms);
                window.location.href ='/logout';

            }
        }
    })
})
$(document).on('click','.showcategory',function(e){
    e.preventDefault();
    var offercategory = $(this).attr('offershow');
    $.ajax({
        type:"get",
        url:"/showblogcates/"+offercategory,
        dataType:"html",
        success:function(res)
        {
            if(res)
            {
                $('#showblog').html(res);
            }
        }
    });
});
$(document).on('click','.showsubcateg',function(e){
    e.preventDefault();
    var offersubcatde = $(this).attr('offershow');
    $.ajax({
        type:"get",
        url:"/subcategoryshows/"+offersubcatde,
        dataType:'html',
        success:function(res)
        {
            if(res)
            {
                $('#showblog').html(res);
            }
        }
    })
})
    });
    // 
</script>
@endsection