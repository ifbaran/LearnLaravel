<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/sweet-alert/sweetalert2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/adminlayout.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <style>
        .margin-right-10px-important {
            margin-right: 10px !important;
        }
    </style>
</head>
<body>
@include('front.menu')
<div class="container pt-5">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                 class="rounded-circle" width="150">
                            <div class="mt-4">
                                <h2>{{ auth()->user()->name }}</h2>
                                <p class="text-muted font-size-sm"> {{ auth()->user()->email }}</p>
                                <h4>Software Engineer</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <form id="user-update-form" action="" method="POST" >
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" value="{{ $user->password }}">
                            </div>
                            <button id= "userUpdate" type="button" class="btn btn-primary" style="width:50%; float: right;">Update</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<script src="{{ asset('assets/sweet-alert/sweetalert2.all.min.js') }}"></script>
@include('sweetalert::alert')
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script>
    $('#userUpdate').click(function () {
        const fullname = $('#name').val();
        const email = $('#email').val();
        if (fullname.trim() === "" || !validateEmail(email.trim()))
        {
            Swal.fire({
                icon:'error',
                title:'Error',
                text: 'Please fill the required areas'
            })
        }
        else
        {
            $('#user-update-form').submit();
        }
    });

    function validateEmail(email) {
        const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }
</script>

</body>
</html>

