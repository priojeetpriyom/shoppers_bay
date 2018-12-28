@extends('layouts.master')

@section('content')
    {{--@include('layouts.messages')--}}


    <div class="row">
        <div class="container">


            @if(isset($order))
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th style="text-align: center;">No. </th>
                    <th style="text-align: center;">Title</th>
                    <th style="text-align: center;">Price</th>
                    <th style="text-align: center;">Quantity</th>
                    <th style="text-align: center;">Subtotal</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $cnt=1; $total=0;
                    $order_details = DB::table('orders_details')
                        ->where('order_id', $order->id)
                        ->get();

                @endphp
                @foreach($order_details as $order_detail)
                    <tr>
                        <td style="text-align: center;" >{{$cnt}}</td>
                        <td style="text-align: center;">{{$order_detail->title}}</td>
                        <td style="text-align: center;">{{$order_detail->price}}</td>
                        <td style="text-align: center;">{{$order_detail->quantity}}</td>
                        <td style="text-align: center;">{{$order_detail->total}}</td>
                    </tr>
                    <?php
                    $cnt++;
                    $total += $order_detail->total;
                    ?>
                @endforeach

                <tr>
                    <td colspan="5" style="text-align: right; padding-right: 3em;">Total: <b>{{$total}}</b></td>
                </tr>
                {{--<tr>--}}
                    {{--<td colspan="5" style="text-align: center; padding-right: 3em;">--}}
                        {{--Payment: <b>--}}
                            {{--{{($order->payment == 'null')? "Pending": "Success"}}--}}
                        {{--</b>--}}
                    {{--</td>--}}
                {{--</tr>--}}
                @if(auth()->user()->admin==1)
                    <tr>
                        <td colspan="5" style="text-align: center; padding-right: 3em;">
                            <b>
                                <a href="/admin/delete/order/{{$order->id}}"><button class="btn btn-danger">Delete</button></a>
                            </b>
                        </td>
                    </tr>
                @endif
                </tbody>
                {{--<tfoot>--}}
                {{--<tr>--}}
                {{--<td colspan="5" style="float: right;">Total: <b>{{$total}}</b></td>--}}
                {{--</tr>--}}
                {{--</tfoot>--}}
            </table>

            @endif







            @if(session()->has('msg-success'))
                {{--dd(session--}}
                <div class="alert alert-success">{{session()->get('msg-success')}}</div>
            @endif

            @if(session()->has('msg-danger'))
                <div class="alert alert-danger">{{session()->get('msg-danger')}}</div>
            @endif
            {{--@if(session('payment-msg'))--}}
            {{--<h2>{{session('payment-msg')}}</h2>--}}
            <h2>
                Current We Are Under Development process and only accept payment through Bkash. Please make Bkash payment in 01700000000 number and insert the transaction id below
            </h2>
            {{--@endif--}}

            <div class="col-md-8">
                <form method="post" action="/user/transaction/check">
                    {{csrf_field()}}
                    <input class="form-control" type="text" name="transaction_id" required>
                    <input class="btn btn-primary" type="submit" style="float: right; margin: 1em;">
                </form>
            </div>

        </div>
    </div>


@endsection