@extends('layouts.master')

@section('content')
{{--{{dd($orders)}}--}}

<?php
        $orderNo = 1;
        ?>

    <div class="row">

        <div class="col-md-2"></div>
        <div class="col-md-8">
            @foreach($orders as $order)
                <h2>Order No. <b>{{$orderNo}}</b></h2>
                @php
                    $orderNo += 1;
                @endphp
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
                    <tr>
                        <td colspan="5" style="text-align: center; padding-right: 3em;">
                            Payment: <b>
                                {{($order->payment == 'null')? "Pending": "Success"}}
                            </b>
                        </td>
                    </tr>
                    @if(auth()->user()->admin==1)
                        <tr>
                            <td colspan="5" style="text-align: center; padding-right: 3em;">
                                <b>
                                    <a href="/admin/delete/order/{{$order->id}}"><button class="btn btn-danger">Delete</button></a>
                                </b>
                            </td>
                        </tr>
                        @php
                        $buyer = $order_detail->buyer_id;
                        $pending = DB::table('pendingTransactions')
                            ->where('user_id', $buyer)
                            ->get();

                        @endphp
                        @if( (count($pending)>=1) && ($order->payment == 'null'))
                        <tr>
                            <td colspan="5" style="text-align: center; padding-right: 3em;" >
                                <b>
                                    <a href="/admin/approve/pendingtransaction/{{$order->id}}/{{$buyer}}"><button class="btn btn-primary">Approve</button></a>
                                </b>
                            </td>
                        </tr>
                         @endif
                    @endif
                    </tbody>
                    {{--<tfoot>--}}
                        {{--<tr>--}}
                            {{--<td colspan="5" style="float: right;">Total: <b>{{$total}}</b></td>--}}
                        {{--</tr>--}}
                    {{--</tfoot>--}}
                </table>
            @endforeach
        </div>
        <div class="col-md-2"></div>

    </div>


@endsection