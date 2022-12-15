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
        <div class="card shadow mb-4" id="showatrbiet">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Page Show All Table Prodectatripet
                    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#exampleModal">
    {{__('Create New Prodectatript')}}
  </button>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{__('Prodect Id')}}</th>
                                <th>{{__('Prodect Name')}}</th>
                                <th>{{__('Prodect Slug')}}</th>
                                <th>{{__('Prodect Image')}}</th>
                                <th>{{__('Prodect attr Image')}}</th>
                                <th>{{__('Prodect Edit')}}</th>
                                <th>{{__('Prodect Delete')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($prodectattrs as $prodectattr)
                            <tr>
                                <td>{{$prodectattr->id}}</td>
                                <td>{{$prodectattr->en_name}}</td>
                                <td>{{$prodectattr->slug}}</td>
                                <td>
                                    <img src="{{asset('admin_panel/img/'.$prodectattr->prodect->image)}}" width="100" height="100" alt="">
                                </td>
                                <td>
                                    <img src="{{asset('admin_panel/img/'.$prodectattr->image)}}" width="100" height="100" alt="">
                                </td>
                                <td>
                                    <a class="btn btn-info editprodectatrr" offerattrpr="{{$prodectattr->id}}" data-toggle="modal" data-target="#exampleModaledit">{{__('Edit')}}</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger deleteprodectatr" offerprodectdlete="{{$prodectattr->id}}">{{__('Delete')}}</a>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
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
          <form enctype="multipart/form-data" id="formprodectatr" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="">{{__('Prodectatripet Name')}}</label>
                <input type="text" name="en_name" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">{{__('اسم المنتجات')}}</label>
                <input type="text" name="ar_name" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">{{__('Prodect Name')}}</label>
                <select name="prodect_id" class="form-control" id="">
                    @php
                        $prodects = App\Models\Product::all();
                    @endphp
                    @foreach ($prodects as $prodect)
                        <option value="{{$prodect->id}}">{{$prodect->en_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12 mb-3">
                <label for="">{{__('Size Name')}}</label>
                <select name="size_id" class="form-control" id="">
                    @php
                        $sizes = App\Models\Size::all();
                    @endphp
                    @foreach ($sizes as $size)
                        <option value="{{$size->id}}">{{$size->en_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12 mb-3">
                <label for="">{{__('color Name')}}</label>
                <select name="color_id" class="form-control" id="">
                    @php
                        $colors = App\Models\Color::all();
                    @endphp
                    @foreach ($colors as $color)
                        <option value="{{$color->id}}">{{$color->en_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12 md-3">
                <input type="file" name="image" class="form-control">
            </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="addnewprodectatr">{{__('Create  New Prodectatripet')}}</button>
        </form>
        </div>
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
          <form enctype="multipart/form-data" id="formprodectatrupdate" method="post">
        @csrf
        <input type="text" name="id" id="offereditde">
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="">{{__('Prodectatripet Name')}}</label>
                <input type="text" name="en_name" id="editnam" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">{{__('اسم المنتجات')}}</label>
                <input type="text" name="ar_name" id="editnamar" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">{{__('Prodect Name')}}</label>
                <select name="prodect_id" class="form-control" id="">
                    @php
                        $prodects = App\Models\Product::all();
                    @endphp
                    @foreach ($prodects as $prodect)
                        <option value="{{$prodect->id}}">{{$prodect->en_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12 mb-3">
                <label for="">{{__('Size Name')}}</label>
                <select name="size_id" class="form-control" id="">
                    @php
                        $sizes = App\Models\Size::all();
                    @endphp
                    @foreach ($sizes as $size)
                        <option value="{{$size->id}}">{{$size->en_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12 mb-3">
                <label for="">{{__('color Name')}}</label>
                <select name="color_id" class="form-control" id="">
                    @php
                        $colors = App\Models\Color::all();
                    @endphp
                    @foreach ($colors as $color)
                        <option value="{{$color->id}}">{{$color->en_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12 md-3">
                <input type="file" name="image" class="form-control">
            </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success updateprodectatr">{{__('Update Prodectatripet')}}</button>
        </form>
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
$(document).on('click','#addnewprodectatr',function(e){
    e.preventDefault();
    var formdata = new FormData($('#formprodectatr')[0]);
    $.ajax({
        type:"post",
        url:"/admin/prodectatrrtstore",
        enctype:"multipart/form-data",
        data:formdata,
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                $('#showatrbiet').load(location.href + " #showatrbiet");
                $('#exampleModal').modal('hide');
            }
        }
        
    });
});
$(document).on('click','.editprodectatrr',function(e){
    e.preventDefault();
    var offereditde = $(this).attr('offerattrpr');
    $.ajax({
        type:"get",
        url:"/admin/prodectatrredit/"+offereditde,
        success:function(res)
        {
            if(res.prodect)
            {
                $('#editnam').val(res.prodect.en_name);
                $('#editnamar').val(res.prodect.ar_name);
                $('#offereditde').val(res.prodect.id);
            }
        }
    });
});
$(document).on('click','.updateprodectatr',function(e){
    e.preventDefault();
    var formdateupde = new FormData($('#formprodectatrupdate')[0]);
    var offerupdesw = $('#offereditde').val();
    $.ajax({
        type:'post',
        url:"/admin/prodectatrrupdate/"+offerupdesw,
        data:formdateupde,
        enctype:"multipart/form-data",
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                $('#showatrbiet').load(location.href + " #showatrbiet");
                $('#exampleModaledit').modal('hide');
            }
        }

    });
});
$(document).on('click','.deleteprodectatr',function(e){
    e.preventDefault();
    var offferdeeet = $(this).attr('offerprodectdlete');
    $.ajax({
        type:"get",
        url:"/admin/prodectatrrdelete/"+offferdeeet,
        data:{
            'id' : offferdeeet,
            '_token' : "{{csrf_token()}}",
        },
        success:function(res)
        {
            if(res)
            {
                $('#showatrbiet').load(location.href + " #showatrbiet");
            }
        }
    })
})
    });
  </script>
@endsection