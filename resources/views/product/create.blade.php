@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-2">
        </div>

        <div class="col-md-8">
            <form method="post" action="/product/submit" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input class="form-control" type="text" name="title" id="title" required>

                </div>

                <div class="form-group">
                    <label for="price">Price:</label>
                    <input class="form-control" type="number" name="price" id="price" required>
                </div>

                <div class="form-group">
                    <label for="category">Category:</label>
                    <div>
                        <select name="category_id" id="category_id" class="custom-select" style="padding-right: 2em; padding-left: 2em; padding-bottom: .5em; padding-top: .5em;">
                            @foreach(\App\Category::all() as $category)
                                <option value="{{$category['id']}}">{{$category['title']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Keywords:</label>
                    <input class="form-control" type="text" name="keywords" id="keywords" required placeholder="seperate by space">
                </div>
                <div class="form-group">
                    <input type="file" name="image" id="image">
                </div>

                <div class="form-group">
                    <button class="submit btn-lg btn-primary" type="submit" >Publish</button>
                </div>
            </form>

            @include('layouts.errors')

        </div>

        <div class="col-md-2">
        </div>
    </div>

    {{--@include('layouts.errors')--}}


@endsection