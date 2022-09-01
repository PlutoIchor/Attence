<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">

    <!-- Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <title>Login | Attence</title>
</head>

<body>
    <form class="form_login_register p-3 pr-5 pl-5 border rounded" action="{{ url('/loginSiswaAuth') }}" method="POST">
        @csrf
        <div class="form-header mb-4">
            <h3 style="font-family: sans-serif">Login</h3>
        </div>

        @if (session()->has('loginError'))
            <div class="alert alert-danger" role="alert">
                {{ session('loginError') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="form-group mb-4">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Email" name="username" autofocus
                required value="{{ old('email') }}">
        </div>
        <div class="form-group mb-4">
            <label for="password">Password yang diberikan</label>
            <input type="password" class="form-control" id="Password" placeholder="Password" name="password" required>
        </div>
        <button type="submit" class="btn w-100 btn-login">
            Sign In
        </button>
        <div class="d-flex flex-column align-items-center mt-4 option-login">
            <p><a href="{{ url('/loginAdmin') }}">Login sebagai Admin</a></p>
            <p> Belum punya akun?<a href="{{ url('/register') }}"> Sign Up</a></p>
        </div>
    </form>
</body>

</html>
