@extends('layouts.master')
@section('content')
    <div class="container">

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-info" style="margin-bottom: 0px;">
                <div class="panel-heading text-center"><h4><b>{{auth()->user()->f_name}}</b>'s Profile</h4></div>
            </div>

            <div class="panel-body table-bordered" style="padding: 2em; margin-top: 0px;">
                <div class="row">
                    <div class="col-md-offset-1 col-md-4" style="width: 14em;">
                        <div class="col-md-offset-1 col-md-4" style="width: 14em;">
                            <img class="img-circle img-responsive" src="/users/images/{{auth()->user()->image}}">

                        </div>
                    </div>
                    <div class="col-md-offset-3 col-md-4 panel panel-info"  style="padding-bottom: 1.5em; margin-top: 1.5em">
                        <h2>Update Profile Picture</h2>
                        <form id="user_image_upload" name="user_image_upload" method="post" action="/user/updateimage" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input class="form-control" id="image" name="image" type="file">
                            <input class="form-control hidden" type="submit" id="submit" name="submit" hidden>
                        </form>
                    </div>
                </div>
                {{--{{dd($user)}}--}}
                <div class="row" style="margin-top: 2.5em; font-size: 2em;">
                    <div class="col-md-8">
                        <div class="container">
                            <table class="table table-hover table-responsive table-striped table-bordered" style="width: 75%;">
                                <tbody>
                                @foreach($user as $key => $val)
                                    <tr>
                                        <td><b>{{$key}}</b></td>
                                        <td>{{$val}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <button class="btn btn-primary" style="float: left; color: #ffffff;"><a href="/user/edit" style=" color: #ffffff;text-decoration: none;">Edit</a></button>

                    <button class="btn btn-danger" data-toggle="modal" data-target="#close" style="float:right;">Close My Account</button>

                    {{--<button type="button" class="btn btn-info btn-lg" >Open Small Modal</button>--}}

                    <!-- account closing Modal -->
                    <div class="modal fade" id="close" role="close account">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Are you Sure To <b>DELETE</b> Your Account?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger"><a href="/user/destroy" class="btn-link" style=" color: #ffffff;text-decoration: none;">Yes</a></button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>


            </div>
        </div>

    </div>


@endsection