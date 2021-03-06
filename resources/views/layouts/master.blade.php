<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WeFashion</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="{{asset('css/index.css')}}" rel="stylesheet">

</head>
<body>

@include('partials.menu')


<div class="row">
    <div class="col-md-12">
        @yield('content')
    </div>
</div>
</div>
@section('scripts')
<!-- JavaScript Bundle with Popper -->

    <script src="{{asset('js/app.js')}}"></script>
@show
</body>

<div class="col-md-12">
    @include('partials.footer')
</div>
</html>
