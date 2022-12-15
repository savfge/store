<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Invoice</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
</head>
<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">Sudan Ecommerce</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Invoice Id: {{$order->id}}</span> <br>
                    <span>Date: {{\Carbon\Carbon::parse($order->created_at)->format('D , d M Y')}}</span> <br>
                    <span>Zip code : {{$order->orderpost}}</span> <br>
                    <span>Address: {{$order->orderaddress1}}</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Order Details</th>
                <th width="50%" colspan="2">User Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Order Id:</td>
                <td>{{$order->id}}</td>

                <td>Full Name:</td>
                <td>{{$order->ordername}} {{$order->orderlname}}</td>
            </tr>
            <tr>
                <td>Tracking Id/No.:</td>
                <td>funda-CRheOqspbA</td>

                <td>Email Id:</td>
                <td>{{$order->orderemail}}</td>
            </tr>
            <tr>
                <td>Ordered Date:</td>
                <td>{{\Carbon\Carbon::parse($order->create_at)->format('D , d M Y H:S:I')}}</td>

                <td>Phone:</td>
                <td>{{$order->orderphone}}</td>
            </tr>
            <tr>
                <td>Payment Mode:</td>
                @foreach($order->transaction as $item)
                <td>{{$item->mode}}</td>
                @endforeach

                <td>Address:</td>
                <td>{{$order->orderaddress1}}</td>
            </tr>
            <tr>
                <td>Order Status:</td>
                <td>{{$order->orderstaus}}</td>

                <td>Pin code:</td>
                <td>{{$order->orderpost}}</td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Order Items
                </th>
            </tr>
            <tr class="bg-blue">
                <th>ID</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php
                $subtotal=0;
            @endphp
            @php
                $tax=0;
            @endphp
            @php
                $subtotal=0;
            @endphp
            @php
                $totaal=0;
            @endphp
            @foreach($order->orderitem as $ite)
            @php
                $subtotal = $ite->amount * $ite->qty;
            @endphp
            @php
                $tax = $ite->amount * $ite->qty *2/100;
            @endphp
            @php
                $subtotal+= $ite->amount * $ite->qty;
            @endphp
            @php
                $totaal+=$ite->amount * $ite->qty-$tax;
            @endphp
            <tr>
                <td width="10%">{{$ite->id}}</td>
                <td>
                    {{$ite->prodect->en_name}}
                </td>
                <td width="10%">L.E{{$ite->amount}}</td>
                <td width="10%">{{$ite->qty}}</td>
                <td width="15%" class="fw-bold">L.E{{$subtotal}}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4" class="total-heading">Total Amount - <small>Inc. all vat/tax</small> :</td>
                <td colspan="1" class="total-heading">L.E{{$totaal}}</td>
            </tr>
        </tbody>
    </table>

    <br>
    <p class="text-center">
        Thank your for shopping with Funda of Web IT
    </p>

</body>
</html>