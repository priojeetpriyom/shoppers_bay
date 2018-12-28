@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-2">

            {{--@if(auth()->user())--}}
                {{--<a href="/product/create" style="text-decoration: none;">--}}
                    {{--<button class="btn btn-lg btn-success" style="padding:1em; margin-bottom: 1em; margin-left: 1em;">--}}
                        {{--Sell Something--}}
                    {{--</button>--}}
                {{--</a>--}}
                {{--<p><br><br></p>--}}
            {{--@endif--}}

            @include('layouts.sidebar')
        </div>
        <div class="col-md-8">

            @if(auth()->user()==null )

                <div class="alert alert-info text-center"><a href="/login"><b>{{'Please Login To Use Features'}}</b></a></div>
            @endif


            <div id="products">

            </div>

            {{--<div class="panel panel-info">--}}
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
            {{--</div>--}}
        </div>
        <div class="col-md-1"></div>

        {{--<div id="xxx"></div>--}}

    </div>
@endsection