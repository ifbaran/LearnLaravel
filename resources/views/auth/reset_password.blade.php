<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Reset Password</title>
    <link rel="stylesheet" href="{{ asset('assets/sweet-alert/sweetalert2.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/signin.css')}}">
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

</head>
<body class="text-center">
<form class="form-signin" action="{{ route('auth.reset_password_login', ['token' => request()->token]) }}" method="POST">
    @csrf
    <img class="mb-4" src="{{asset('assets/img/bootstrap-logo.svg')}}" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Forgot Password</h1>

    <div class="form-floating">
        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="name@example.com">
        <label for="inputEmail">Email address</label>
    </div>

    @if(request()->token)
        <div class="form-floating">
            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
            <label for="inputPassword">Password</label>
        </div>
    @endif
    <br>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Reset Password</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
</form>
<script src="{{ asset('assets/sweet-alert/sweetalert2.all.min.js') }}"></script>
@include('sweetalert::alert')

{{--<script>--}}
{{--    <?php--}}
{{--    $swalText = '';--}}
{{--    if ($errors->any())--}}
{{--    {--}}
{{--        foreach ($errors->all() as $error)--}}
{{--        {--}}
{{--            $swalText .= $error . '<br>';--}}
{{--        }--}}
{{--    }--}}
{{--    ?>--}}
{{--    @if($errors->any())--}}
{{--    Swal.fire({--}}
{{--        icon: 'error',--}}
{{--        title: 'Hata',--}}
{{--        html: '{!! $swalText !!}'--}}
{{--    });--}}
{{--    @endif--}}

{{--</script>--}}

</body>
</html>
