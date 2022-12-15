@extends('layouts.admin')
@section('content')
     <!-- Begin Page Content -->
     <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4" id="showblogs">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Page Show All Table Blogs
                    <button style="float:right;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                       {{__('Create New Blog')}}
                      </button>
                      
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{__('Blog Id')}}</th>
                                <th>{{__('Blog Name')}}</th>
                                <th>{{__('Blog Slug')}}</th>
                                <th>{{__('Blog Image')}}</th>
                                <th>{{__('Blog Edit')}}</th>
                                <th>{{__('Blog Delete')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $blog)
                            <tr>
                                <td>{{$blog->id}}</td>
                                <td>{{$blog->name}}</td>
                                <td>{{$blog->slug}}</td>
                                <td>
                                    <img src="{{asset('admin_panel/img/'.$blog->image)}}" width="100" height="100" alt="">
                                </td>
                                <td>
                                    <a class="editblog btn btn-info" offerblog="{{$blog->id}}"data-toggle="modal" data-target="#exampleModaledit">{{__('Edit')}}</a>
                                </td>
                                <td>
                                    <a class="deleteblog btn btn-danger" offerdeleteblo="{{$blog->id}}">{{__('Delete')}}</a>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                    {!! $blogs->links() !!}
                    <style>
                        svg{
                            height: 20px;
                        }
                    </style>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form enctype="multipart/form-data" id="formblogs" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="">{{__('Blog Name')}}</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">{{__('Blog Short Description')}}</label>
                <textarea name="short_desc" id="" cols="3" rows="3" class="form-control"></textarea>
            </div>
            <div class="col-md-12 mb-3">
                <label for="">{{__('Blog Long Descripton')}}</label>
                <textarea name="long_desc" class="form-control" id="" cols="10" rows="10"></textarea>
            </div>
            <div class="col-md-12 mb-3">
                <label for="">{{__('Blog Iamge')}}</label>
                <input type="file" name="image[]" multiple class="form-control" id="">
            </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="addnewblog">{{__('Create New Blog')}}</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  {{-- End Add New Modal --}}
  <div class="modal fade" id="exampleModaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form enctype="multipart/form-data" id="formblogsupdate" method="post">
        @csrf
        <input type="text" name="id" id="offereditblofde">
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="">{{__('Blog Name')}}</label>
                <input type="text" name="name" id="editnme" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">{{__('Blog Short Description')}}</label>
                <textarea name="short_desc" id="editblogshort" cols="3" rows="3" class="form-control"></textarea>
            </div>
            <div class="col-md-12 mb-3">
                <label for="">{{__('Blog Long Descripton')}}</label>
                <textarea name="long_desc" class="form-control" id="blog_long_desc" cols="10" rows="10"></textarea>
            </div>
            <div class="col-md-12 mb-3">
                <label for="">{{__('Blog Iamge')}}</label>
                <input type="file" name="image"  class="form-control" id="">
            </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success updateblogde">{{__('Update Blog')}}</button>
        </div>
    </form>
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
$(document).on('click','#addnewblog',function(e){
    e.preventDefault();
    var formdata = new FormData($('#formblogs')[0]);
    $.ajax({
        type:"post",
        url:"/admin/blogtstore",
        enctype:"multipart/form-data",
        data:formdata,
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                $('#showblogs').load(location.href + " #showblogs");
                $('#exampleModal').modal('hide');
            }
        }
    });
});
$(document).on('click','.editblog',function(e){
    e.preventDefault();
    var offereditblofde = $(this).attr('offerblog');
    $.ajax({
        type:"get",
        url:"/admin/blogedit/"+offereditblofde,
        success:function(res)
        {
            if(res.blog)
            {
                $('#offereditblofde').val(res.blog.id);
                $('#editnme').val(res.blog.name);
                $('#editblogshort').val(res.blog.short_desc);
                $('#blog_long_desc').val(res.blog.long_desc);
            }
        }
    });
});
$(document).on('click','.updateblogde',function(e){
    e.preventDefault();
    var formdataupde = new FormData($('#formblogsupdate')[0]);
    var offervaluew = $('#offereditblofde').val();
    $.ajax({
        type:"post",
        url:"/admin/blogupdate/"+offervaluew,
        enctype:"multipart/form-data",
        data:formdataupde,
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                $('#showblogs').load(location.href + " #showblogs");
                $('#exampleModaledit').modal('hide');
            }
        }
    });
});
$(document).on('click','.deleteblog',function(e){
    e.preventDefault();
    var offerdeler = $(this).attr('offerdeleteblo');
    $.ajax({
        type:"get",
        url:"/admin/blogdelete/"+offerdeler,
        data:{
            'id' : offerdeler,
            '_token' : '{{csrf_token()}}',
        },
        success:function(res)
        {
            if(res)
            {
                $('#showblogs').load(location.href + " #showblogs");
            }
        }
    })
})
    });
  </script>
@endsection