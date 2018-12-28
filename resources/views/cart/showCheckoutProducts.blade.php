<?php
$f_total=0;
?>
@foreach ($products as $res)
    @php
        $id = $res->id;
        $image = $res->product_image;
        $title = $res->product_title;
        $price = $res->price;
        $quantity = $res->quantity;
        $p_total = $price * $quantity;
    @endphp
    <div class='row' style='padding:1em;'>
        <div class='col-md-2'>
            <div class='btn-group'>
                <a id='{{$id}}' href='#' class='cart_page_item_delete btn btn-danger'><span class='glyphicon glyphicon-trash'></span></a>
                <a id='{{$id}}' href='#' class='cart_page_product_quantity_update btn btn-primary'><span class='glyphicon glyphicon-ok-sign'></span></a>
            </div>
        </div>
        <div class='col-md-2'><img src='/products/images/{{$image}}' style='width:4em;'></div>
        <div class='col-md-2'>{{$title}}</div>
        <div class='col-md-2'>
            <input type='text' id='unit_price-{{$id}}' name='cart_page_product_price' value='{{$price}}' class='form-control' disabled>
        </div>
        <div class='col-md-2'>
            <input type='text' name='cart_page_product_quantity' id='quantity-{{$id}}' cart_id='{{$id}}' class='cart_page_product_quantity form-control' value='{{$res->quantity}}' >
        </div>
        <div class='col-md-2'>
        <input type='text' id='product_price-{{$id}}' value='{{$p_total}}' class='form-control' disabled>
        </div>
    </div>
    <div class='divider'></div>
	@php
     $f_total += $p_total;
    @endphp

@endforeach

<hr>
<div class="row">
    <h3 style='float:right;' id='cart_page_total_price'>{{$f_total}}</h3>
    <h3 style='float:right;'>Total Price: $</h3>
</div>


<div style="margin-top: 2em;">
    <a href="/cart/checkout/payment" style="float: right; margin-right: 2em;">  <button class="btn btn-primary">Checkout</button></a>
</div>

