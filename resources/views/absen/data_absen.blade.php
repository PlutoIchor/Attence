@extends('layouts.main')

@section('content')
    <div class="header d-flex flex-row align-items-center mb-3">
        <i class="fa-solid fa-calendar-check mr-2" style="font-size: 30px"></i>
      <h2 class="mb-0">Absen Perkelas</h2>
    </div>
    <div class="tabel-data" style="border-color:black">
        <ul class="list-group">
            @foreach ($data as $item)
                <li class="list-group-item">
                    <h4 class="text-secondary">
                        <b>
                            <a href="">{{ $item->nama_kelas }}</a>
                        </b> <span class="badge badge-warning">50%</span></h4>
                    <h5>Wali Kelas : {{ $item->wali_kelas }}</h5>
                    <div class="info d-flex flex-row">
                        <div class="alert alert-info" role="alert">
                            Jumlah Siswa <span class="badge badge-light">30</span>
                          </div>
                          <div class="alert alert-primary ml-5" role="alert">
                            Siswa yang sudah absen <span class="badge badge-light">15</span>
                          </div>
                    </div>
                </li>
            @endforeach
          </ul>
    </div>
    <div class="d-flex justify-content-center mt-5">
        {{ $data->links() }}
    </div>

@endsection