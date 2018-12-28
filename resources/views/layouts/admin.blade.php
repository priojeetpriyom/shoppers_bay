
<?php

$cur_time = time();
$main_js_loc = asset('js/main.js')."?v=".($cur_time);
?>
        <!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <meta charset="UTF-8">
    <title>Website Name</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script  src=<?php echo '"'.$main_js_loc.'"';?> ></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</head>
{{--<body>--}}

{{--<!-- //header navigation -->--}}
{{--<div class="navbar navbar-inverse navbar-fixed-top">--}}
{{--<div class="container-fluid">--}}
{{--<div class="navbar-header">--}}
{{--<a class="navbar-brand" href="{{}} "> {{"Shoppers Bay";}} </a>--}}
{{--</div>--}}

{{--<ul class="nav navbar-nav">--}}
{{--<li ><a href="#">Home <span class="glyphicon glyphicon-home"></span></a></li>--}}
{{--<li ><a href="#">Product <span class="glyphicon glyphicon-modal-window"></span></a></li>--}}
{{--<li style="width: 25em; top: .5em;"><input type="text" class="form-control"  id="search_text"></li>--}}
{{--<li style="left: .5em; top: .5em;"><input  type="submit" class="form-control btn btn-primary" id="search_btn" value="search"></li>--}}
{{--</ul>--}}

{{--<ul class="nav navbar-nav navbar-right" >--}}
{{--<li><a href="#" class="dropdown" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span> Cart <span class="badge">0</span></a>--}}
{{--<ul class="dropdown-menu">--}}
{{--<div class="panel panel-success" style="width: 40em;">--}}
{{--<div class="panel-heading">--}}
{{--<div class="row">--}}
{{--<div class="col-md-3">SL. No</div>--}}
{{--<div class="col-md-3">Product Image</div>--}}
{{--<div class="col-md-3">Product Name</div>--}}
{{--<div class="col-md-3">Price In $</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="panel-body"></div>--}}
{{--<div class="panel-footer"></div>--}}
{{--</div>--}}
{{--</ul>--}}


{{--</li>--}}
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
{{--<li><a href="registration_page.php">Sign Up <span class="glyphicon glyphicon-user"></span></a></li>--}}

{{--</ul>--}}


{{--</div>--}}
{{--</div>--}}
{{--<p>--}}
{{--<br>--}}
{{--<br>--}}
{{--<br>--}}
{{--</p>--}}

{{--<!-- //content with products, catagories, brands -->--}}
{{--<div class="container_fluid">--}}

{{--<div id="action_msg" class="container"></div>--}}

{{--<div class="row">--}}
{{--<div class="col-md-1"></div>--}}
{{--<div class="col-md-2">--}}
{{--<div id="catagory"></div>--}}
{{--<div id="brand"></div>--}}
{{--<!-- <ul class="nav nav-pills nav-stacked">--}}
{{--<li class="active"><a href="#"><h4>Catagories</h4></a></li>--}}
{{--<li class=""><a href="#">Catagories</a></li>--}}
{{--<li class=""><a href="#">Catagories</a></li>--}}
{{--<li class=""><a href="#">Catagories</a></li>--}}
{{--</ul>--}}


{{--<ul class="nav nav-pills nav-stacked">--}}
{{--<li class="active"><a href="#"><h4>Brands</h4></a></li>--}}
{{--<li class=""><a href="#">Catagories</a></li>--}}
{{--<li class=""><a href="#">Catagories</a></li>--}}
{{--<li class=""><a href="#">Catagories</a></li>--}}
{{--</ul> -->--}}
{{--</div>--}}
{{--<div class="col-md-8">--}}
{{--<div id="products">--}}

{{--</div>--}}

{{--<!-- <div class="panel panel-info">--}}
{{--<div class="panel-heading">Products</div>--}}
{{--<div class="panel-body">--}}

{{--<div class="col-md-4">--}}
{{--<div class="panel panel-info">--}}
{{--<div class="panel-heading">Writing</div>--}}
{{--<div class="panel-body">--}}
{{--<img src="product_images/image1.jpg">--}}
{{--</div>--}}
{{--<div class="panel-heading">$50 <button style="float: right;" class="btn btn-danger btn-xs">Add To Cart</button></div>--}}
{{--</div>--}}
{{--</div>--}}

{{--</div>--}}
{{--<div class="panel-footer">&copy; 2017</div>--}}
{{--</div> -->--}}
{{--</div>--}}
{{--<div class="col-md-1"></div>--}}
{{--</div>--}}
{{--</div>--}}

{{--<p id="xxx">--}}
{{--<br>--}}
{{--<br>--}}
{{--<br>--}}
{{--</p>--}}
{{--<!-- <p id="some_p">a paragraph</p>--}}
{{--<a href="#" onclick="make_alert(XXX)"; id="some_link">axxx</a>--}}
{{--<button type="button" id="some_button" class="btn btn-primary">abc</button> -->--}}

{{--</body>--}}
{{--</html>--}}


{{--$cur_time = time();--}}
{{--$main_js_loc = "main.js?v=".($cur_time);--}}
{{--?>--}}
{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--<meta charset="UTF-8">--}}
{{--<title>Shoppers Bay</title>--}}
{{--<!-- Latest compiled and minified CSS -->--}}
{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}

{{--<!-- jQuery library -->--}}
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}

{{--<!-- Latest compiled JavaScript -->--}}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}

{{--<script  src=<?php echo '"'.$main_js_loc.'"';?> ></script>--}}
{{--</head>--}}
<body>

<!-- //header navigation -->
<div class="navbar navbar-inverse navbar-fixed-top">
    @include('layouts.navigationAdmin')
</div>
<div class="row">
    @if(session()->has('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <p style="padding: 4em;">
    </p>
</div>

<!-- //content with products, catagories, brands -->
<div class="container_fluid">

    <div id="action_msg" class="container"></div>
    @yield('content')

</div>
</div>

<p id="xxx">
    <br>
    <br>
    <br>
</p>
{{--<div id="xxx"></div>--}}
{{--<p id="some_p">a paragraph</p>--}}
{{--<a href="#" onclick="make_alert(XXX)"; id="some_link">axxx</a>--}}
{{--<button type="button" id="some_button" class="btn btn-primary">abc</button>--}}

</body>
{{--</html>--}}