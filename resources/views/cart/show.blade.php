@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-2"><b>Action</b></div>
                            <div class="col-md-2"><b>Product Image</b></div>
                            <div class="col-md-2"><b>Product Name</b></div>
                            <div class="col-md-2"><b>Product Price</b></div>
                            <div class="col-md-2"><b>Product Quantity</b></div>
                            <div class="col-md-2"><b>Price In $</b></div>
                        </div>
                    </div>
                    <div class="panel-body" id="cart_page_items_container">
                        <div class="col-md-2">
                            <div class="btn-group">
                                <a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                <a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span></a>
                            </div>
                        </div>
                        <div class="col-md-2"><img src="product_images/"></div>
                        <div class="col-md-2"><b>Product Name</b></div>
                        <div class="col-md-2"><input type="text" id="cart_page_product_price" name="cart_page_product_price" value="100" class="form-control" disabled></div>
                        <div class="col-md-2"><input type="text" name="cart_page_product_quantity" id="cart_page_product_quantity" class="form-control" value="1" ></div>
                        <div class="col-md-2"><b>Price In $</b></div>
                    </div>
                </div>
            </div>

            <div class="col-md-2"></div>
        </div>


    </div>
@endsection