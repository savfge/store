<div class="blog-details-wrapper">
    @foreach($blogs as $blog)
    <div class="blog-details-top">
        <div class="blog-details-img">
            <img alt="" src="{{asset('admin_panel/img/'.$blog->image)}}" >
        </div>
        <div class="blog-details-content">
            <div class="blog-meta-2">
                <ul>
                    <li>News</li>
                    <li>{{\Carbon\Carbon::parse($blog->create_at)->format('M , Y D')}}</li>
                </ul>
            </div>
            <h1>{{$blog->en_name}}</h1>
            <p>{{$blog->long_desc}}<br><br></p>
            <blockquote>Lorem ipsum dolor sit amet, consecte adipisicing elit, sed do eiusmod tempor incididunt labo dolor magna aliqua. Ut enim ad minim veniam quis nostrud.</blockquote>
            <p>{{$blog->short_desc}}<br><br>.</p>
        </div>
    </div>
    @endforeach
</div>