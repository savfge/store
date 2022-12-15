<div>
<div class="blog-area pt-120 pb-120">
    <div class="container">
        <div class="row">
            @foreach($blogs as $blog)
            <div class="col-lg-4 col-md-6 col-12 col-sm-6">
                <div class="blog-wrap mb-40">
                    <div class="blog-img mb-20">
                        <a href="{{route('blogs',$blog->id)}}"><img src="{{asset('admin_panel/img/'.$blog->image)}}" width="250" height="250" alt="blog-img"></a>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <ul>
                                <li><a href="{{route('blogs',$blog->id)}}">Comment: {{$blog->commentse->count()}} </a></li>
                                <li>{{\Carbon\Carbon::parse($blog->create_at)->format('M , Y D')}}</li>
                            </ul>
                        </div>
                        <h1><a href="{{route('blogs',$blog->id)}}">{{$blog->name}}</a></h1>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-12">
                <div class="pro-pagination-style text-center mt-10">
                   {!!$blogs->links()!!}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
