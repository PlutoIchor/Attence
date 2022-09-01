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

    <title>Register | Attence</title>
</head>

<body>
    <form class="form_login_register p-3 pr-5 pl-5 border rounded" action="{{ url('/register_auth') }}" method="POST">
        @csrf
        <div class="form-header mb-4">
            <h3 style="font-family: sans-serif">Register</h3>
        </div>
        <div class="form-group mb-4">
            <input type="text" class="form-control @error('username')is-invalid @enderror" id="formGroupExampleInput"
                placeholder="Username" name="username" required value="{{ old('username') }}">
            @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-row mb-4">
            <div class="col">
                <input type="text" class="form-control @error('email')is-invalid @enderror" placeholder="Email"
                    name="email" required value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col">
                <input type="text" class="form-control @error('phone_number')is-invalid @enderror"
                    placeholder="Nomor Telepon" name="phone_number" required value="{{ old('phone_number') }}">
                @error('phone_number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group mb-4">
            <input type="password" class="form-control @error('password')is-invalid @enderror"
                id="formGroupExampleInput" placeholder="Password" name="password" required>
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group mb-4">
            <input type="password" class="form-control @error('confirm_password')is-invalid @enderror"
                id="formGroupExampleInput" placeholder="Confirm Password" name="password_confirmation" required>
            @error('confirm_password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn w-100 btn-login">
            Sign Up
        </button>
        <div class="d-flex justify-content-center mt-4 option-login">
            <p> Sudah punya akun?<a href="{{ url('/loginAdmin') }}"> Sign In</a></p>
        </div>
    </form>
</body>

</html>
