@if(count($errors))
    <div class="form-group" style="padding-top:2em;">
        <div class="alert alert-sm alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>

                @endforeach
            </ul>

        </div>
    </div>

@endif