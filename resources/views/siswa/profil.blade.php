@extends('siswa.layouts.main')

@section('content')
    <div class="tabel-data p-3 mb-3 border rounded" style="border-color:black">
        <div class="header d-flex flex-row">
            <h1>{{ $user->username }}</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary ml-3 h-50 my-auto" data-toggle="modal" data-target="#ubahPassword">
                Ubah Password
            </button>

            <!-- Modal -->
            <div class="modal fade" id="ubahPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Ubah Password</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('/ubahPassword') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password Lama</label>
                                    <input type="password" class="form-control" id="exampleCheck1" name="password_lama"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password Baru</label>
                                    <input type="password" class="form-control" id="exampleCheck1" name="password_baru"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Konfirmasi Password Baru</label>
                                    <input type="password" class="form-control" id="exampleCheck1"
                                        name="konfirmasi_password_baru" required>
                                </div>
                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <p>Kelas : {{ $siswa->classroom->nama_kelas }}</p>
        <p>Nama Lengkap : {{ $siswa->nama_lengkap }}</p>
        <p>Nama Panggilan : {{ $siswa->nama_panggilan }}
            <button type="button" class="btn btn-secondary ml-3" data-toggle="modal" data-target="#exampleModalCenter">
                Ubah
            </button>
            <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="{{ url('/ubahNamaPanggilan') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Panggilan</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="nama_panggilan" required>
                                <small id="emailHelp" class="form-text text-muted">Saya kira kamu dipanggil {{ $siswa->nama_panggilan }}. Hehe <i class="fa-regular fa-face-grin-beam-sweat"></i></small>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </p>
        <p>NIS : {{ $siswa->NIS }}</p>
        <p>Nomor Absen : {{ $siswa->nomor_absen }}</p>
        <p>E-mail : {{ $siswa->email }}</p>
    </div>
@endsection
