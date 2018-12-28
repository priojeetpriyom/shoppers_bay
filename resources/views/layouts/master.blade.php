
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

<body>

<!-- //header navigation -->
<div class="navbar navbar-inverse navbar-fixed-top">
    @include('layouts.navigation')
</div>
<div class="row">
    @if(session()->has('msg-success'))
        <div class="alert alert-success">{{session()->get('msg-success')}}</div>
    @endif

    @if(session()->has('msg-danger'))
        <div class="alert alert-danger">{{session()->get('msg-danger')}}</div>
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