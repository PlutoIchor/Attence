<!DOCTYPE html>
<html>
    <head>
        <title>Attence</title>
        <!-- Bootstrap -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>    
        <!-- Bootstrap -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


        <!-- Fontawesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}"">
    </head>
    <body>
          <div class="left-section">
            <div class="web-logo d-flex flex-row align-items-center mt-3 mb-3 ml-auto mr-auto">
                <i class="fa-solid fa-laptop" style="font-size: 35px; color: white;"></i>
                <h3 class="pl-2 m-auto"><a href="{{ url('/dashboard') }}" style="color: white; text-decoration: none">Attence</a></h3>
            </div>
            <div class="content-nav mt-3" style="color: white">
                <ul class="list-nav" style="list-style: none">
                    <li class="nav-type">REPORTS</li>
                    <li class="nav-con"><i class="fa-solid fa-folder-open"></i><a href="{{ url('dashboard') }}">Dashboard</a></li>
                    <li class="nav-type">MANAGE</li>
                    <li class="nav-con"><i class="fa-solid fa-chalkboard-user"></i><a href="{{ url('daftar_kelas') }}">Daftar Kelas</a></li>
                    <li class="nav-con"><i class="fa-solid fa-calendar-days"></i><a href="#">Jadwal</a></li>
                </ul>
                <hr>
                <div class="logout align-items-center">
                    <p><?php echo date('d-m-y h:i'); ?></p>
                    <p><a href="#" style="padding-left: 0">Logout</a></p>
                </div>
            </div>
          </div>
          <div class="right-section p-4">
                @yield('content')
          </div>
    </body>
</html>