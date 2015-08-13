@extends('planear')

@section('content')
<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">welcome <a>{{Auth::user()->us_name}}</a> there is no active event at this moment</div>
            </div>
        </div>
    </body>
</html>
@endsection