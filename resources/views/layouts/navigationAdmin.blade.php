{{--@extends('layouts.master')--}}

{{--@section('navigation')--}}

<div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="/admin"><?php echo "Shoppers Bay";?></a>
    </div>

    <ul class="nav navbar-nav">
        <li ><a href="#">Home <span class="glyphicon glyphicon-home"></span></a></li>
        <li ><a href="#">Product <span class="glyphicon glyphicon-modal-window"></span></a></li>
        <li style="width: 25em; top: .5em;"><input type="text" class="form-control"  id="search_text"></li>
        <li style="left: .5em; top: .5em;"><input  type="submit" class="form-control btn btn-primary" id="search_btn" value="search"></li>
    </ul>

    <ul class="nav navbar-nav navbar-right" >


        @if(auth()->user())
            <li><a class="dropdown-toggle" data-toggle="dropdown" href="#">Hi, {{auth()->user()->f_name}} <span class="glyphicon glyphicon-log-in"></span></a>
                <ul class="dropdown-menu">

                    {{--<li class="divider"></li>--}}
                    <li><a href="/admin/profile">Profile</a></li>
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