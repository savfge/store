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
        <div class="card shadow mb-4" id="showprodect">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('Page Show Prodect Table')}}
                    <button type="button" style="float: right;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                       {{__('Create New Products')}}
                      </button>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{__('Prodect Id')}}</th>
                                <th>{{__('Prodect Name')}}</th>
                                <th>{{__('Prodect Slug')}}</th>
                                <th>{{__('Prodect price')}}</th>
                                <th>{{__('Caategory Name')}}</th>
                                <th>{{__('Subcategory Name')}}</th>
                                <th>{{__('Color Name')}}</th>
                                <th>{{__('Stock Name')}}</th>
                                <th>{{__('Size Name')}}</th>
                                <th>{{__('Prodect Staus')}}</th>
                                <th>{{__('Prodect New')}}</th>
                                <th>{{__('Prodect  Image')}}</th>
                                <th>{{__('Prodect Edit')}}</th>
                                <th>{{__('Prodect Delete')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($prodects as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->en_name}}</td>
                                <td>{{$item->slug}}</td>
                                <td>{{$item->new_price}}</td>
                                <td>{{$item->category->en_name}}</td>
                                <td>{{$item->subcategory->en_name}}</td>
                                <td>{{$item->color->en_name}}</td>
                                <td>{{$item->stock->en_name}}</td>
                                <td>{{$item->size->en_name}}</td>
                                <td>{{$item->staus==1 ? 'Man' : 'Women'}}</td>
                                <td>{{$item->new==1 ? 'New' : 'Sale'}}</td>
                                <td>
                                    <img src="{{asset('admin_panel/img/'.$item->image)}}" width="100" height="100" alt="">
                                </td>
                                <td>
                                    <a class="btn btn-info editprodectsw" offereditpoc="{{$item->id}}" data-toggle="modal" data-target="#exampleModaledit">{{__('Edit')}}</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger deleteprrodect" offerddlete="{{$item->id}}">{{__('Delete')}}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!!$prodects->links()!!}
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
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form enctype="multipart/form-data" id="formprodect" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Name')}}</label>
                    <input type="text" name="en_name" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('اسم المنتجات')}}</label>
                    <input type="text" name="ar_name" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Category Name')}}</label>
                    <select name="category_id" class="form-control" id="">
                        @php
                            $categorys = App\Models\Category::all();
                        @endphp
                        @foreach ($categorys as $category)
                            <option value="{{$category->id}}">{{$category->en_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('SubCategory Name')}}</label>
                    <select name="subcategory_id" class="form-control" id="">
                        @php
                            $subcategorys = App\Models\SubCategory::all();
                        @endphp
                        @foreach ($subcategorys as $subcategory)
                            <option value="{{$subcategory->id}}">{{$subcategory->en_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Color Name')}}</label>
                    <select name="color_id" class="form-control" id="">
                        @php
                            $colors = App\Models\Color::all();
                        @endphp
                        @foreach ($colors as $color)
                            <option value="{{$color->id}}">{{$color->en_name}}</option>
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
                    <label for="">{{__('Stock Name')}}</label>
                    <select name="stock_id" class="form-control" id="">
                        @php
                            $stocks = App\Models\Stock::all();
                        @endphp
                        @foreach ($stocks as $stock)
                            <option value="{{$stock->id}}">{{$stock->en_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect New Price')}}</label>
                    <input type="text" name="new_price" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Old Price')}}</label>
                    <input type="text" name="old_price" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect New')}}</label>
                    <br>
                    <input type="radio" name="new" value="1" id="">
                    {{__('New')}}
                    <br><br>
                    <input type="radio" name="new" value="2" id="">
                    {{__('Sall')}}
                    <br><br>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Short Description')}}</label>
                    <textarea name="short_desc" class="form-control" id="" cols="10" rows="10"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Long Description')}}</label>
                    <textarea name="long_desc" class="form-control" id="" cols="10" rows="10"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Image')}}</label>
                    <input type="file" name="image" class="form-control" id="">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Staus')}}</label>
                    <br>
                    <input type="radio" name="staus" value="1" id="">
                    {{__('Man')}}
                    <br><br>
                    <input type="radio" name="staus" value="2" id="">
                    {{__('Women')}}
                    <br><br>
                    <input type="radio" name="staus" value="3" id="">
                    {{__('Kids')}}
                    <br><br>
                    <input type="radio" name="staus" value="4" id="">
                    {{__('Acceiress')}}
                    <br><br>
                    <input type="radio" name="staus" value="5" id="">
                    {{__('Fotwer')}}
                    <br><br>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="addnewprodect">{{__('Create New Products')}}</button>
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
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form enctype="multipart/form-data" id="formprodectupd" method="post">
            @csrf
            <input type="text" name="id" id="offeredit">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Name')}}</label>
                    <input type="text" name="en_name" id="editen_name" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('اسم المنتجات')}}</label>
                    <input type="text" name="ar_name" id="editar_name" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Category Name')}}</label>
                    <select name="category_id" class="form-control" id="">
                        @php
                            $categorys = App\Models\Category::all();
                        @endphp
                        @foreach ($categorys as $category)
                            <option value="{{$category->id}}">{{$category->en_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('SubCategory Name')}}</label>
                    <select name="subcategory_id" class="form-control" id="">
                        @php
                            $subcategorys = App\Models\SubCategory::all();
                        @endphp
                        @foreach ($subcategorys as $subcategory)
                            <option value="{{$subcategory->id}}">{{$subcategory->en_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Color Name')}}</label>
                    <select name="color_id" class="form-control" id="">
                        @php
                            $colors = App\Models\Color::all();
                        @endphp
                        @foreach ($colors as $color)
                            <option value="{{$color->id}}">{{$color->en_name}}</option>
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
                    <label for="">{{__('Stock Name')}}</label>
                    <select name="stock_id" class="form-control" id="">
                        @php
                            $stocks = App\Models\Stock::all();
                        @endphp
                        @foreach ($stocks as $stock)
                            <option value="{{$stock->id}}">{{$stock->en_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect New Price')}}</label>
                    <input type="text" name="new_price" id="editnew_price" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Old Price')}}</label>
                    <input type="text" name="old_price" id="edit_old_price" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect New')}}</label>
                    <br>
                    <input type="radio" name="new" value="1" id="">
                    {{__('New')}}
                    <br><br>
                    <input type="radio" name="new" value="2" id="">
                    {{__('Sall')}}
                    <br><br>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Short Description')}}</label>
                    <textarea name="short_desc" class="form-control" id="edit_short_desc" cols="10" rows="10"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Long Description')}}</label>
                    <textarea name="long_desc" class="form-control" id="edit_long_desc" cols="10" rows="10"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Image')}}</label>
                    <input type="file" name="image" class="form-control" id="">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Staus')}}</label>
                    <br>
                    <input type="radio" name="staus" value="1" id="">
                    {{__('Man')}}
                    <br><br>
                    <input type="radio" name="staus" value="2" id="">
                    {{__('Women')}}
                    <br><br>
                    <input type="radio" name="staus" value="3" id="">
                    {{__('Kids')}}
                    <br><br>
                    <input type="radio" name="staus" value="4" id="">
                    {{__('Acceiress')}}
                    <br><br>
                    <input type="radio" name="staus" value="5" id="">
                    {{__('Fotwer')}}
                    <br><br>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success updatepoder">{{__('Update Products')}}</button>
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
$(document).on('click','#addnewprodect',function(e){
    e.preventDefault();
    var formdata = new FormData($('#formprodect')[0]);
    $.ajax({
        type:"post",
        url:"/admin/prodectstore",
        data:formdata,
        enctype:"multipart/form-data",
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                $('#showprodect').load(location.href + " #showprodect");
                $('#exampleModal').modal('hide');
            }
        }
    });
});
$(document).on('click','.editprodectsw',function(e){
    e.preventDefault();
    var offeredit = $(this).attr('offereditpoc');
    $.ajax({
        type:"get",
        url:"/admin/prodectedit/"+offeredit,
        success:function(res)
        {
            if(res.prodect)
            {
                $('#offeredit').val(res.prodect.id);
                $('#editen_name').val(res.prodect.en_name);
                $('#editar_name').val(res.prodect.ar_name);
                $('#editnew_price').val(res.prodect.new_price);
                $('#edit_old_price').val(res.prodect.old_price);
                $('#edit_short_desc').val(res.prodect.short_desc);
                $('#edit_long_desc').val(res.prodect.long_desc);
            }
        }
    });
});
$(document).on('click','.updatepoder',function(e){
    e.preventDefault();
    var formdataupde = new FormData($('#formprodectupd')[0]);
    var offerupde = $('#offeredit').val();
    $.ajax({
        type:"post",
        url:"/admin/prodectupdate/"+offerupde,
        data:formdataupde,
        enctype:"multipart/form-data",
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                $('#showprodect').load(location.href + " #showprodect");
                $('#exampleModaledit').modal('hide');
            }
        }
    });
});
$(document).on('click','.deleteprrodect',function(e){
    e.preventDefault();
    var offerdsw = $(this).attr('offerddlete');
    $.ajax({
        type:"get",
        url:"/admin/prodectdelete/"+offerdsw,
        data:{
            'id' : offerdsw,
            '_token' : "{{csrf_token()}}",
        },
        success:function(res)
        {
            if(res)
            {
                $('#showprodect').load(location.href + " #showprodect");
            }
        }
    });
});
    });
  </script>
  @endsection