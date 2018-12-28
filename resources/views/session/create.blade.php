@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-2">
        </div>

        <div class="col-md-8">
            <form method="post" action="/login">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input class="form-control" type="email" name="email" id="email" required>

                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input class="form-control" type="password" name="password" id="password" required>
                </div>

                <div class="form-group">
                    <button class="submit btn btn-primary" type="submit" >Log In</button>
                </div>
            </form>

            @include('layouts.errors')

        </div>

        <div class="col-md-2">
        </div>
    </div>

    {{--@include('layouts.errors')--}}


@endsection