
@php
    $query = DB::table('carts')->where('user_id', auth()->user()->id)->get();

    $serial = 1; $total=0;

@endphp

@foreach ($cart as $res)
    @php
        $p_name = $res['product_title'];
        $p_image = "/products/images/".$res['product_image'];
        $quantity = $res['quantity'];
        $price = $res['price'];
        $p_id = $res['product_id'];
        $id = $res['id'];

        $total += ($quantity * $price);
    @endphp

    <div style='padding:.5em;' class='row'>



        <div class='col-md-offset-1 col-md-1'>
            {{$serial}}
        </div>

        <div class='col-md-2'>
            {{$p_name}}
        </div>

        <div class='col-md-2'>
            <img style='width:3em; height:1.5em;' src='{{$p_image}}'>
        </div>

        <div class='col-md-2'>
            {{$price}}
        </div>

        <div class='col-md-2'>
            {{$quantity}}
        </div>


        <div class='col-md-2'>
            <button id='{{$id}}' class='remove_item_from_cart btn btn-danger btn-md'>X</button>
        </div>
        <p class='divider'></p>
    </div>


    @php
        $serial+=1;
    @endphp

@endforeach

<div class='divider'>
</div>
<div class='row ' style='padding:1em;'>
    <div class='col-md-10' style='padding-left:20em;'>Total Price</div>
    <div class='col-md-2' style='float: right;'>${{$total}}</div>
</div>
