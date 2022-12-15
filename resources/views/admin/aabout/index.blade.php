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
        <div class="card shadow mb-4" id="showaboum">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example
                    <button style="float: right" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        {{__('Add New About')}}
                      </button>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{__('About Id')}}</th>
                                <th>{{__('About Name')}}</th>
                                <th>{{__('About title')}}</th>
                                <th>{{__('About Date')}}</th>
                                <th>{{__('About Image')}}</th>
                                <th>{{__('About Satus')}}</th>
                                <th>{{__('About Change')}}</th>
                                <th>{{__('About Edit')}}</th>
                                <th>{{__('About Dlete')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($abouts as $about)
                            <tr>
                                <td>{{$about->id}}</td>
                                <td>{{$about->name}}</td>
                                <td>{{$about->title}}</td>
                                <td>{{\Carbon\Carbon::parse($about->created_at)->format('D , d M Y H:i:S')}}</td>
                                <td>
                                    {{$about->staus==1 ? 'About' : 'Team'}}
                                </td>
                                <td>
                                @if ($about->staus==1)
                                    <a  class="btn btn-danger editstausunp" offereder="{{$about->id}}">{{__('Unblsheds')}}</a>
                                @else
                                <a aboutdess="{{$about->id}}" class="btn btn-success aboutdess" >{{__('Publisheds')}}</a>  
                                @endif
                            </td>
                                <td>
                                    <img src="{{asset('admin_panel/img/'.$about->image)}}" width="100" height="100" alt="">
                                </td>
                                <td>
                                    <a offereditabout="{{$about->id}}"  class="btn btn-info editdedit" data-toggle="modal" data-target="#exampleModaledit">{{__('Edit')}}</a>
                                </td>
                                <td>
                                    <a offerdeleteabout="{{$about->id}}" class="btn btn-danger dleteabout">{{__('Delete')}}</a>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                    {!! $abouts->links() !!}
                    <style>
                        svg{
                            width:20px;
                        }
                    </style>
                </div>
            </div>
        </div>

    </div>
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
          <form id="formboutaddnew" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="">{{__('About Name')}}</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">{{__('About Title')}}</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">{{__('About Image')}}</label>
                <input type="file" name="image[]" multiple class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">{{__('About Staus')}}</label>
                <br>
                <input type="radio" name="staus" value="1">
                {{__('About')}}
                <br><br>
                <input type="radio" name="staus" value="2">
                {{__('Team')}}
                <br><br>
                <input type="radio" name="staus" value="3">
                {{__('Teastmtio')}}
                <br><br>
            </div>
            <div class="col-md-12 mb-3">
                <textarea type="radio" name="desc" class="form-control"></textarea>
            </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="addnewabout">{{__('Add New About')}}</button>
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
          <form id="formboutupdate" enctype="multipart/form-data" method="post">
        @csrf
        <input type="text" name="id" id="offervaalue">
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="">{{__('About Name')}}</label>
                <input type="text" name="name" id="editname" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">{{__('About Title')}}</label>
                <input type="text" name="title" id="edittite" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">{{__('About Image')}}</label>
                <input type="file" name="image"  class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">{{__('About Staus')}}</label>
                <br>
                <input type="radio" name="staus" value="1">
                {{__('About')}}
                <br><br>
                <input type="radio" name="staus" value="2">
                {{__('Team')}}
                <br><br>
                <input type="radio" name="staus" value="3">
                {{__('Teastmtio')}}
                <br><br>
            </div>
            <div class="col-md-12 mb-3">
                <textarea id="editdesc" name="desc" class="form-control"></textarea>
            </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-info editaboute">{{__('Update About')}}</button>
        </div>
    </form>
      </div>
    </div>
  </div>
    <!-- /.container-fluid -->
    <script src="{{asset('jquery-3.6.0.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).on('click','#addnewabout',function(e){
    e.preventDefault();
    var formdata = new FormData($('#formboutaddnew')[0]);
    $.ajax({
        type:"post",
        url:"/admin/aboutatrrtstore",
        enctype:"multipart/form-data",
        data:formdata,
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                $('#showaboum').load(location.href + " #showaboum");
                $('#exampleModal').modal('hide');
            }
        }
    });
});
$(document).on('click','.editdedit',function(e){
    e.preventDefault();
    var offervaalue = $(this).attr('offereditabout');
    $.ajax({
        type:"get",
        url:"/admin/aboutatrredit/"+offervaalue,
        success:function(res)
        {
            if(res.about)
            {
                $('#offervaalue').val(res.about.id);
                $('#editname').val(res.about.name);
                $('#edittite').val(res.about.title);
                $('#editdesc').val(res.about.desc);
            }
        }
    });
});
$(document).on('click','.editaboute',function(e){
    e.preventDefault();
    var offerupder = $('#offervaalue').val();
    var formdarde = new FormData($('#formboutupdate')[0]);
    $.ajax({
        type:"post",
        url:"/admin/aboutatrrupdate/"+offerupder,
        data:formdarde,
        enctype:"multipart/form-data",
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                $('#showaboum').load(location.href + " #showaboum");
                $('#exampleModaledit').modal('hide');
            }
        }
    })
});
$(document).on('click','.dleteabout',function(e){
    e.preventDefault();
    var offerdleede = $(this).attr('offerdeleteabout');
    $.ajax({
        type:"get",
        url:"/admin/aboutatrrdelete/"+offerdleede,
        data:{
            'id' : offerdleede,
            '_token' : "{{csrf_token()}}",
        },
        success:function(res)
        {
            if(res)
            {
                $('#showaboum').load(location.href + " #showaboum");
            }
        }
    });
});
$(document).on('click','.editstausunp',function(e){
    e.preventDefault();
    var offerdewa = $(this).attr('offereder');
    $.ajax({
        type:"post",
        url:"/admin/editstausunp/"+offerdewa,
        data:{
            'id' :offerdewa,
            '_token' : "{{csrf_token()}}",
        },
        success:function(res)
        {
            if(res)
            {
                $('#showaboum').load(location.href + " #showaboum");
            }
        }
    });
});
$(document).on('click','.aboutdess',function(e){
    e.preventDefault();
    var offedswssq = $(this).attr('aboutdess');
    $.ajax({
        type:"post",
        url:"/admin/aboutdess/"+offedswssq,
        data:{
            'id' : offedswssq,
            '_token' : "{{csrf_token()}}",
        },
        success:function(res)
        {
            if(res)
            {
                $('#showaboum').load(location.href + " #showaboum");
            }
        }
    })
})
        });
    </script>
@endsection