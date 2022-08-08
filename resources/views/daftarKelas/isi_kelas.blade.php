@extends('layouts.main')

@section('content')
    <div class="header d-flex flex-row align-items-center mb-3">
        <i class="fa-solid fa-person-chalkboard mr-2" style="font-size: 30px"></i>
      <h2 class="mb-0">{{ $nama_kelas }}</h2>
    </div>
    <div class="tabel-data p-3 mb-5 border rounded" style="border-color:black">
      <div class="table-header">
        <div class="table-header mb-3">
          <button type="button" class="btn btn-info" onclick="window.location.href='{{ url('/form_tambah_siswa') }}'">
            Tambah Siswa
          </button>
        </div>
      </div>
      <div class="table-body">
        <table class="table">
          <thead class="thead-light">
            <tr>
              <th scope="col">No</th>
              <th scope="col">NIS</th>
              <th scope="col">Nama Lengkap</th>
              <th scope="col">Nomor Absen</th>
              <th scope="col">Email</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $item)
                <tr class="row_siswa" onclick="window.location.href='{{ url('/informasi_siswa/' . $item->id_siswa) }}'"">
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->NIS }}</td>
                  <td class="nama_siswa">{{ $item->nama_lengkap }}</td>
                  <td>{{ $item->nomor_absen }}</td>
                  <td>{{ $item->email }}</td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      </div>
      
@endsection