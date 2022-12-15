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
        <div class="card shadow mb-4" id="showsilder">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Page Show table Silders
                    <!-- Button trigger modal -->
<button type="button" style="float: right;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
   {{__('Create New Silders')}}
  </button>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{__('Silder Id')}}</th>
                                <th>{{__('Sidler Name')}}</th>
                                <th>{{__('Silder Staus')}}</th>
                                <th>{{__('Silder Image')}}</th>
                                <th>{{__('Sidler Edit')}}</th>
                                <th>{{__('Silder Delete')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($silders as $silder)
                            <tr>
                                <td>{{$silder->id}}</td>
                                <td>{{$silder->en_name}}</td>
                                <td>{{$silder->staus==1 ? 'Silder' : 'Barnd'}}</td>
                                <td>
                                    <img src="{{asset('admin_panel/img/'.$silder->image)}}" width="100" height="100" alt="">
                                </td>
                                <td>
                                    <a class="btn btn-info sildereditw" offersilder="{{$silder->id}}" data-toggle="modal" data-target="#exampleModaledit">{{__('Edit')}}</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger deletesilder" offersilderdel="{{$silder->id}}">{{__('Delete')}}</a>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                    {!! $silders->links() !!}
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
         <form enctype="multipart/form-data" id="formsilders" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Silder Name')}}</label>
                    <input type="text" name="en_name" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('اسم المنزلق')}}</label>
                    <input type="text" name="ar_name" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Silder Image')}}</label>
                    <input type="file" multiple name="image[]" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Silder Description')}}</label>
                    <textarea name="en_desc" class="form-control" id="" cols="10" rows="10"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('نص المنزلق')}}</label>
                    <textarea name="ar_desc" class="form-control" id="" cols="10" rows="10"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Sidler Staus')}}</label>
                    <br>
                    <input type="radio" name="staus" value="1" id="">
                    {{__('Silder')}}
                    <br><br>
                    <input type="radio" name="staus" value="2" id="">
                    {{__('Barnd')}}
                    <br><br>
                    <input type="radio" name="staus" value="3" id="">
                    {{__('Shop')}}
                    <br><br>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="addnewsilders">{{__('Create New Silder')}}</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  {{-- End add New Modl --}}
  <div class="modal fade" id="exampleModaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form enctype="multipart/form-data" id="formsildersupder" method="post">
            @csrf
            <input type="text" name="id" id="oferedit">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Silder Name')}}</label>
                    <input type="text" name="en_name" id="editname" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('اسم المنزلق')}}</label>
                    <input type="text" name="ar_name" id="editarnme" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Silder Image')}}</label>
                    <input type="file"  name="image" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Silder Description')}}</label>
                    <textarea name="en_desc" class="form-control" id="editdesc" cols="10" rows="10"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('نص المنزلق')}}</label>
                    <textarea name="ar_desc" class="form-control" id="editardesc" cols="10" rows="10"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Sidler Staus')}}</label>
                    <br>
                    <input type="radio" name="staus" value="1" id="">
                    {{__('Silder')}}
                    <br><br>
                    <input type="radio" name="staus" value="2" id="">
                    {{__('Barnd')}}
                    <br><br>
                    <input type="radio" name="staus" value="3" id="">
                    {{__('Shop')}}
                    <br><br>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success editsilders" >{{__('Update Silder')}}</button>
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
$(document).on('click','#addnewsilders',function(e){
    e.preventDefault();
    var formdata = new FormData($('#formsilders')[0]);
    $.ajax({
        type:"post",
        url:"/admin/silderstore",
        data:formdata,
        enctype:"multipart/form-data",
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                $('#showsilder').load(location.href + " #showsilder");
                $('#exampleModal').modal('hide');
            }
        }
    });
});
$(document).on('click','.sildereditw',function(e){
    e.preventDefault();
    var oferedit = $(this).attr('offersilder');
    $.ajax({
        type:"get",
        url:"/admin/silderedit/"+oferedit,
        success:function(res)
        {
            if(res.silder)
            {
                $('#oferedit').val(res.silder.id);
                $('#editname').val(res.silder.en_name);
                $('#editarnme').val(res.silder.ar_name);
                $('#editdesc').val(res.silder.en_desc);
                $('#editardesc').val(res.silder.ar_desc);
            }
        }
    });
});
$(document).on('click','.editsilders',function(e){
    e.preventDefault();
    var formdarte = new FormData($('#formsildersupder')[0]);
    var offerwsw = $('#oferedit').val();
    $.ajax({
        type:"post",
        url:"/admin/silderupdate/"+offerwsw,
        data:formdarte,
        enctype:"multipart/form-data",
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                $('#showsilder').load(location.href + " #showsilder");
                $('#exampleModaledit').modal('hide');
            }
        }
    });
});
$(document).on('click','.deletesilder',function(e){
    e.preventDefault();
    var offerdelete = $(this).attr('offersilderdel');
    $.ajax({
        type:"get",
        url:"/admin/silderdelete/"+offerdelete,
        data:{
            'id' : offerdelete,
            '_token' : "{{csrf_token()}}",
        },
        success:function(res)
        {
            if(res)
            {
                $('#showsilder').load(location.href + " #showsilder");
            }
        }
    })
})
    });

  </script>
@endsection