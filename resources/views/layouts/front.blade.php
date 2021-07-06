<!doctype html>
<html lang="tr">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    @yield('css')
</head>
<body>

@include('front.menu')
<div class="content min-vh-100 m-5">
    <div class="container">
        <div class="row">
            <div class="col-8">
                @yield('content')
            </div>
            <div class="col-4">
                @include('front.category')
            </div>

        </div>
    </div>
</div>

<footer >
    <div style="padding:10px 0px;" class="container-fluid bg-dark text-center text-white">
        İbrahim Furkan Baran
    </div>
</footer>

<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.js')}}"></script>
@yield('js')
</body>
</html>
