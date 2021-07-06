<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Register</title>

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

    <form class="form-signin" action="" method="POST">

        @csrf
        <img class="mb-4" src="{{asset('assets/img/bootstrap-logo.svg')}}" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
            <input type="text" name="name" class="form-control" id="inputName" placeholder="Name">
            <label for="inputName">Full Name</label>
        </div>
        <div class="form-floating">
            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="name@example.com">
            <label for="inputEmail">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
            <label for="inputPassword">Password</label>
        </div>

        <div class="form-floating">
            <input type="password" name="password_confirmation" class="form-control" id="inputPasswordConfirmation" placeholder="Password Confirmation">
            <label for="inputPasswordConfirmation">Password Confirmation</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
    </form>



</body>
</html>
