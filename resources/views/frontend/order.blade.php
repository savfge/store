@extends('layouts.home')
@section('content')
<style>
    h1,h2,h3,h4,h5,h6{
        margin: 0;
        padding: 0;
    }
    p{
        margin: 0;
        padding: 0;
    }
    .container{
        width: 80%;
        margin-right: auto;
        margin-left: auto;
    }
    .brand-section{
       background-color: #0d1033;
       padding: 10px 40px;
    }
    .logo{
        width: 50%;
    }

    .row{
        display: flex;
        flex-wrap: wrap;
    }
    .col-6{
        width: 50%;
        flex: 0 0 auto;
    }
    .text-white{
        color: #fff;
    }
    .company-details{
        float: right;
        text-align: right;
    }
    .body-section{
        padding: 16px;
        border: 1px solid gray;
    }
    .heading{
        font-size: 20px;
        margin-bottom: 08px;
    }
    .sub-heading{
        color: #262626;
        margin-bottom: 05px;
    }
    table{
        background-color: #fff;
        width: 100%;
        border-collapse: collapse;
    }
    table thead tr{
        border: 1px solid #111;
        background-color: #f2f2f2;
    }
    table td {
        vertical-align: middle !important;
        text-align: center;
    }
    table th, table td {
        padding-top: 08px;
        padding-bottom: 08px;
    }
    .table-bordered{
        box-shadow: 0px 0px 5px 0.5px gray;
    }
    .table-bordered td, .table-bordered th {
        border: 1px solid #dee2e6;
    }
    .text-right{
        text-align: end;
    }
    .w-20{
        width: 20%;
    }
    .float-right{
        float: right;
    }
</style>
<div style="margin: 30px;cursor: pointer" >
    <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white">{{__('Fashion Company')}}</h1>
                </div>
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    <h2 class="heading">Invoice No.: {{$order->id}}</h2>
                    <p class="sub-heading">Tracking No. fabcart2025 </p>
                    <p class="sub-heading">Order Date: {{\Carbon\Carbon::parse($order->created_at)->format('D , d M Y')}} </p>
                    <p class="sub-heading">Email Address: {{$order->orderemail}} </p>
                </div>
                <div class="col-6">
                    <p class="sub-heading" style="text-align: right;">Full Name: {{$order->ordername}} {{$order->orderlname}} </p>
                    <p class="sub-heading" style="text-align: right;">Address: {{$order->orderaddress1}}</p>
                    <p class="sub-heading" style="text-align: right;">Phone Number: {{$order->orderphone}} </p>
                    <p class="sub-heading" style="text-align: right;">City: {{$order->ordercity}} </p>
                </div>
            </div>
        </div>

        <div class="body-section">
            <h3 class="heading" style="margin: 5px;">Ordered Items
                <a href="{{route('sendmail',$order->id)}}" style="float: right;margin:5px;" target="_blank" class="btn btn-info">{{__('Send Email')}}</a>
                <a href="" style="float: right;margin:5px;"  class="btn btn-dark">{{__('Download Invoice')}}</a>
            </h3>
            <br>
            <table class="table-bordered text-center">
                <thead>
                    <tr>
                        <th>{{__('Image')}}</th>
                        <th >Product</th>
                        <th class="w-20">Price</th>
                        <th class="w-20">Quantity</th>
                        <th class="w-20">Grandtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $tax=0;
                    @endphp
                    @php
                        $subtotl=0;
                    @endphp
                    @php
                        $subtotalpl=0;
                    @endphp
                    @php
                        $total=0;
                    @endphp
                    @foreach($order->orderitem as $itme)
                    @php
                        $subtotl= $itme->amount * $itme->qty;
                    @endphp
                    @php
                        $subtotalpl+=$itme->amount * $itme->qty;
                    @endphp
                    @php
                        $tax = $itme->amount * $itme->qty *2/100;
                    @endphp
                    @php
                        $total+=$itme->amount * $itme->qty - $tax;
                    @endphp
                    <tr>
                        <td>
                            <img src="{{asset('admin_panel/img/'.$itme->prodect->image)}}" width="70" height="70" alt="">
                        </td>
                        <td>{{$itme->prodect->en_name}}</td>
                        <td>L.E {{$itme->amount}}</td>
                        <td>{{$itme->qty}}</td>
                        <td>L.E {{$subtotl}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" class="text-right">Sub Total</td>
                        <td>L.E {{$subtotalpl}}</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right">Tax Total %2X</td>
                        <td> L.E {{$tax}}</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right">Grand Total</td>
                        <td> L.E{{ $total}}</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <h3 class="heading">Payment Status: {{$order->orderstaus}}</h3>
            @foreach($order->transaction as $ider)
            <h3 class="heading">Payment Mode: {{$ider->mode}}</h3>
            @endforeach
        </div>

        <div class="body-section">
            <p>&copy; Copyright {{\Carbon\Carbon::parse($order->create_at)->format('D , d M Y')}} - Fabcart. All rights reserved. 
                <a href="https://www.fundaofwebit.com/" class="float-right">www.fundaofwebit.com</a>
            </p>
        </div>      
    </div>      
</div>
@endsection