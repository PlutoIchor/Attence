@extends('layouts.main')

@section('content')
    <form class="form_login_register p-3 m-5 border rounded" action="{{ url('/tambah_siswa/' . $id_kelas) }}" method="POST">
        @csrf
        <div class="form-header mb-2">
            <h3>Tambah Siswa Baru</h3>
        </div>
        <hr>
        <div class="form-body">
            <div class="form-row">
                <div class="form-group col">
                    <label for="exampleFormControlInput1">NIS</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="NIS" name="nis"
                        required>
                </div>
                <div class="form-group col">
                    <label for="exampleFormControlInput1">Nomor Absen</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Nomor Absen"
                        name="nomor_absen" required>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Nama Lengkap</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Panggilan"
                    name="nama_lengkap" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Nama Panggilan</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Panggilan"
                    name="nama_panggilan" required>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="exampleFormControlInput1">Email</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email"
                        name="email" required>
                </div>
                <div class="form-group col">
                    <label for="exampleFormControlInput1">Nomor Telepon</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nomor Telepon"
                        name="no_telp" required>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                <select class="form-control" id="exampleFormControlSelect1" name="jk" required>
                    <option value="" disabled selected hidden>Pilih Jenis Kelamin</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
        </div>
        <div class="form-footer mt-4 df flex-row ">
            <button type="button" class="btn btn-secondary"
                onclick="window.location.href='{{ url('/isi_kelas/' . $id_kelas) }}'">Kembali</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </form>
@endsection
