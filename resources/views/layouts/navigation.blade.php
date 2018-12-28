{{--@extends('layouts.master')--}}

{{--@section('navigation')--}}

    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/"><?php echo "Shoppers Bay";?></a>
        </div>

        <ul class="nav navbar-nav">
            <li ><a href="#">Home <span class="glyphicon glyphicon-home"></span></a></li>
            <li ><a href="#">Product <span class="glyphicon glyphicon-modal-window"></span></a></li>
            <li style="width: 25em; top: .8em;"><input type="text" class="form-control"  id="search_text"></li>
            <li style="left: .5em; top: .8em;"><input  type="submit" class="form-control btn btn-primary" id="search_btn" value="search"></li>
        </ul>

        <ul class="nav navbar-nav navbar-right" >

            <li style="bottom: .35em;">
                @if(auth()->user())
                    <a href="/product/create" style="text-decoration: none;" style="">
                        <button class="btn btn-md btn-success" style=" margin-right: 1em;">
                            Sell Something
                        </button>
                    </a>
                    {{--<p><br><br></p>--}}
                @endif
            </li>

            <li><a href="#" class="dropdown" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span> Cart <span id="cart_items_count" class="badge">0</span></a>
                <ul class="dropdown-menu">
                    <div class="panel panel-success" style="width: 40em;">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-2">SL. No</div>
                                <div class="col-md-2">Product Name</div>
                                <div class="col-md-2">Product Image</div>
                                <div class="col-md-2">Price In $</div>
                                <div class="col-md-2">Quantity</div>
                            </div>
                        </div>
                        <div id="cart_items" class="panel-body"></div>
                        <div class="panel-body" style="margin-top: .5em">
                            <a href="/cart/checkout" class="text-center" style="float: right;"><button class="btn btn-success">CheckOut</button></a>
                        </div>
                    </div>
                </ul>


            </li>


            @if(auth()->user())
                <li><a class="dropdown-toggle" data-toggle="dropdown" href="#">Hi, {{auth()->user()->f_name}} <span class="glyphicon glyphicon-log-in"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/orders"  style="color:blue;">My Orders</a></li>
                        <li class="divider"></li>
                        <li><a href="/user/profile">Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="/user/recharge">Payment</a></li>
                        <li class="divider"></li>
                        <li><a href="/logout">LogOut</a></li>
                    </ul>

                </li>
            @else
                {{--<li><a class="dropdown-toggle" data-toggle="dropdown" href="#">Sign In <span class="glyphicon glyphicon-log-in"></span></a>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--<!-- <li>sadasdsad</li> -->--}}
                        {{--<div style="width: 22em;" class="panel panel-primary">--}}
                            {{--<div class="panel-heading">--}}
                                {{--<label for="email">Email:</label> <input type="email" class="form-control" id="u_email" name="u_email">--}}
                                {{--<label for="password">Password:</label> <input type="password" class="form-control" id="u_pass" name="u_pass">--}}
                                {{--<a href="#" style="list-style: none; color: white;">forgotten password?</a>--}}
                                {{--<input type="button" style="margin-top: 1em; float: right; width: 5em;" class="form-control btn btn-success" id="login_button" name="login_button" value="Log In">--}}
                            {{--</div>--}}

                        {{--</div>--}}
                    {{--</ul>--}}

                {{--</li>--}}
                <li><a href="/login">Sign In <span class="glyphicon glyphicon-log-in"></span></a></li>
                <li><a href="/user/create">Sign Up <span class="glyphicon glyphicon-user"></span></a></li>
            @endif
        </ul>


    </div>

    {{--@endsection--}}