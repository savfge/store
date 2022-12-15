@extends('layouts.home')
@section('content')
<div class="breadcrumb-area bg-gray">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li class="active">my account </li>
            </ul>
        </div>
    </div>
</div>
<!-- my account wrapper start -->
<div class="my-account-wrapper pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- My Account Page Start -->
                <div class="myaccount-page-wrapper">
                    <!-- My Account Tab Menu Start -->
                    <div class="row">
                        <div class="col-lg-3 col-md-4">
                            <div class="myaccount-tab-menu nav" role="tablist">
                                <a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-dashboard"></i>
                                    Dashboard</a>
                                <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>
                                <a href="#download" data-toggle="tab"><i class="fa fa-cloud-download"></i> Download</a>
                                <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i> Payment
                                    Method</a>
                                <a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i> address</a>
                                <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Account Details</a>
                                <a href="{{route('logout')}}"><i class="fa fa-sign-out"></i> Logout</a>
                            </div>
                        </div>
                        <!-- My Account Tab Menu End -->
                        <!-- My Account Tab Content Start -->
                        <div class="col-lg-9 col-md-8">
                            <div class="tab-content" id="myaccountContent">
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Dashboard</h3>
                                        <div class="welcome">
                                            <p>Hello, <strong>Alex Tuntuni</strong> (If Not <strong>Tuntuni !</strong><a href="login-register.html" class="logout"> Logout</a>)</p>
                                        </div>

                                        <p class="mb-0">From your account dashboard. you can easily check & view your recent orders, manage your shipping and billing addresses and edit your password and account details.</p>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="orders" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Orders</h3>
                                        <div class="myaccount-table table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Status</th>

                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orders as $items)
                                                    <tr>
                                                        <td>{{$items->id}}</td>
                                                        <td>{{\Carbon\Carbon::parse($items->created_at)->format('D , d M Y H:I:S')}}</td>
                                                        <td>{{$items->orderstaus}}</td>
                                                        <td><a href="{{route('order',$items->id)}}" class="check-btn sqr-btn ">View</a></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="download" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Downloads</h3>
                                        <div class="myaccount-table table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Date</th>
                                                        <th>Expire</th>
                                                        <th>Download</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Haven - Free Real Estate PSD Template</td>
                                                        <td>Aug 22, 2018</td>
                                                        <td>Yes</td>
                                                        <td><a href="#" class="check-btn sqr-btn "><i class="fa fa-cloud-download"></i> Download File</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>HasTech - Profolio Business Template</td>
                                                        <td>Sep 12, 2018</td>
                                                        <td>Never</td>
                                                        <td><a href="#" class="check-btn sqr-btn "><i class="fa fa-cloud-download"></i> Download File</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Payment Method</h3>
                                        <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Billing Address</h3>
                                        <address>
                                            <p><strong>Alex Tuntuni</strong></p>
                                            <p>1355 Market St, Suite 900 <br>
                                        San Francisco, CA 94103</p>
                                            <p>Mobile: (123) 456-7890</p>
                                        </address>
                                        <a href="#" class="check-btn sqr-btn "><i class="fa fa-edit"></i> Edit Address</a>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="account-info" role="tabpanel"id="showaccount">
                                    <div class="myaccount-content">
                                        <h3>Account Details</h3>
                                        <div class="account-details-form">
                                            <form id="editaccount" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="single-input-item">
                                                            <label for="first-name" class="required">First Name</label>
                                                            <input type="text" id="first-name" name="name" value="{{Auth::user()->name}}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="single-input-item">
                                                            <label for="last-name" class="required">Last Name</label>
                                                            <input type="text" id="last-name" name="lname" value="{{Auth::user()->lname}}" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="single-input-item">
                                                    <label for="display-name" class="required">Streat Address  1</label>
                                                    <input type="text" id="display-name"  name="address1" value="{{Auth::user()->address1}}" />
                                                </div>
                                                <div class="single-input-item">
                                                    <label for="display-name" class="required">Streat Address 2</label>
                                                    <input type="text" id="display-name"  name="address2" value="{{Auth::user()->address2}}" />
                                                </div>
                                                <div class="single-input-item">
                                                    <label for="display-name" class="required">City</label>
                                                    <input type="text" id="display-name"  name="city" value="{{Auth::user()->city}}" />
                                                </div>
                                                <div class="single-input-item">
                                                    <label for="display-name" class="required">Country</label>
                                                    <input type="text" id="display-name"  name="country" value="{{Auth::user()->country}}" />
                                                </div>
                                                <div class="single-input-item">
                                                    <label for="display-name" class="required">Phone Number</label>
                                                    <input type="text" id="display-name"  name="phone" value="{{Auth::user()->phone}}" />
                                                </div>
                                                <div class="single-input-item">
                                                    <label for="display-name" class="required">Post Code</label>
                                                    <input type="text" id="display-name"  name="postcode" value="{{Auth::user()->postcode}}" />
                                                </div>
                                                <div class="single-input-item">
                                                    <label for="display-name" class="required">Profile</label>
                                                    <input type="file" id="display-name"  name="image" value="{{Auth::user()->postcode}}" />
                                                    <img src="{{asset('admin_panel/img/'.Auth::user()->image)}}" width="100" height="100" alt="">
                                                </div>
                                                <div class="single-input-item">
                                                    <label for="email" class="required">Email Addres</label>
                                                    <input type="email" id="email" value="{{Auth::user()->email}}" name="email" />
                                                </div>
                                                <div class="single-input-item">
                                                    <button class="check-btn sqr-btn addnewacoountsuse">Save Changes</button>
                                                </div>
                                            </form>
                                            <br><br>
                                            <form id="formchangpassw" enctype="multipart/form-data" method="POST">
                                                @csrf
                                                <fieldset>
                                                    
                                                    <legend>Password change</legend>
                                                    <div class="single-input-item">
                                                        <label for="current-pwd" class="required">Current Password</label>
                                                        <input type="password" value="{{Auth::user()->password}}" id="current-pwd"  name="oldpassword"/>
                                                        @error('oldpassword')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                                <label for="new-pwd" class="required">New Password</label>
                                                                <input type="password" value="{{Auth::user()->password}}" id="new-pwd" name="password" />
                                                                @error('password')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                                <label for="confirm-pwd" class="required">Confirm Password</label>
                                                                <input type="password" value="{{Auth::user()->password}}" id="confirm-pwd" name="password" />
                                                                @error('password')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                            </div>
                                                        </div>
                                                        <div class="single-input-item">
                                                            <button class="check-btn sqr-btn changpassword">Changes Password</button>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div> <!-- Single Tab Content End -->
                            </div>
                        </div> <!-- My Account Tab Content End -->
                    </div>
                </div> <!-- My Account Page End -->
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
$(document).on('click','.addnewacoountsuse',function(e){
e.preventDefault();
var formdata = new FormData($('#editaccount')[0]);
$.ajax({
    type:"post",
    url:"/accountstore",
    enctype:"multipart/form-data",
    data:formdata,
    processData:false,
    contentType:false,
    cache:false,
    success:function(res)
    {
        if(res)
        {
            $('#showaccount').load(location.href + " #showaccount");
            alertify.set('notifier','position', 'top-right');
            alertify.success(res.sms);
        }
    }
});
});
$(document).on('click','.changpassword',function(e){
    e.preventDefault();
    var formdatsws = new FormData($('#formchangpassw')[0]);
    $.ajax({
        type:"post",
        url:"/changepasswords",
        enctype:"multipart/form-data",
        data:formdatsws,
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                $('#showaccount').load(location.href + " #showaccount");
                 alertify.set('notifier','position', 'top-right');
               alertify.success(res.sms);
               window.location.href='/logout';
            }
        }
    })
})
    });
</script>
@endsection