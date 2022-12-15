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
        <div class="card shadow mb-4" id="showcategory">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('Page Show Stock Table')}}
                    <button type="button" style="float: right;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        {{__('Create New Stock')}}
                      </button>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{__('Stock Id')}}</th>
                                <th>{{__('Stock Name')}}</th>
                                <th>{{__('Stock Slug')}}</th>
                                <th>{{__('Stock Staus')}}</th>
                                <th>{{__('Stock Edit')}}</th>
                                <th>{{__('Stock Delete')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stocks as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->en_name}}</td>
                                <td>{{$category->slug}}</td>
                                <td>{{$category->staus==1 ? 'Fashion' : 'Elecriens'}}</td>
                                <td>
                                    <a class="btn btn-info editcategory" offered="{{$category->id}}" data-toggle="modal" data-target="#exampleModaledit">{{__('Edit')}}</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger deletecategory" offerdelete="{{$category->id}}">{{__('Delete')}}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!!$stocks->links() !!}
                    <style>
                        svg{
                            width: 30px;
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
          <form enctype="multipart/form-data" method="post" id="formstock">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Stock Name')}}</label>
                    <input type="text" name="en_name" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('اسم المخازن')}}</label>
                    <input type="text" name="ar_name" class="form-control" id="">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Stock Staus')}}</label>
                    <br>
                    <input type="radio" name="staus" value="1" id="">
                    {{__('Fashion')}}
                    <br><br>
                    <input type="radio" name="staus" value="2" id="">
                    {{__('Elecriens')}}
                    <br><br>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="addnewstock">{{__('Create New Stock')}}</button>
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
          <form enctype="multipart/form-data" method="post" id="formcategoryupde">
            @csrf
            <input type="hidden" name="id" id="offerede">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Stock Name')}}</label>
                    <input type="text" name="en_name" id="showennme" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('اسم المخازن')}}</label>
                    <input type="text" name="ar_name" id="showarname" class="form-control" id="">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Stock Staus')}}</label>
                    <br>
                    <input type="radio" name="staus" value="1" id="">
                    {{__('Fashion')}}
                    <br><br>
                    <input type="radio" name="staus" value="2" id="">
                    {{__('Elecriens')}}
                    <br><br>
                </div>
            
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success updatcategory" >{{__('Update Stocks')}}</button>
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
$(document).on('click','#addnewstock',function(e){
    e.preventDefault();
    var formdata = new FormData($('#formstock')[0]);
    $.ajax({
        type:"post",
        url:"/admin/stockstore",
        enctype:"multipart/form-data",
        data:formdata,
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                $('#showcategory').load(location.href + " #showcategory");
                $('#exampleModal').modal('hide');
            }
        }
    });
});
$(document).on('click','.editcategory',function(e){
    e.preventDefault();
    var offerede = $(this).attr('offered');
    $.ajax({
        type:"get",
        url:"/admin/stockedit/"+offerede,
        success:function(res)
        {
            if(res.stock)
            {
                $('#offerede').val(res.stock.id);
                $('#showennme').val(res.stock.en_name);
                $('#showarname').val(res.stock.ar_name);

            }
        }
    });
});
$(document).on('click','.updatcategory',function(e){
    e.preventDefault();
    var formdataupd = new FormData($('#formcategoryupde')[0]);
    var offerupder = $('#offerede').val();
    $.ajax({
        type:"post",
        url:"/admin/stockupdate/"+offerupder,
        enctype:"multipart/form-data",
        data:formdataupd,
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                $('#showcategory').load(location.href + " #showcategory");
                $('#exampleModaledit').modal('hide');
            }
        }
    });
});
$(document).on('click','.deletecategory',function(e){
    e.preventDefault();
    var offerdelet = $(this).attr('offerdelete');
    $.ajax({
        type:"get",
        url:"/admin/stockdelete/"+offerdelet,
        data:{
            'id' : offerdelet,
            '_token' : "{{csrf_token()}}",
        },
        success:function(res)
        {
            if(res)
            {
                $('#showcategory').load(location.href + " #showcategory");
            }
        }
    })
})
    });
  </script>
@endsection