@extends('layouts.main')

@section('content')
    <div class="header d-flex flex-row align-items-center mb-3">
        <i class="fa-solid fa-calendar-check mr-2" style="font-size: 30px"></i>
        <?php
                $today = getdate()['wday'];
                $hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                ?>
        <h2 class="mb-0">Absen Perkelas Hari {{ $hari[$today] }}</h2>
    </div>
    <div class="tabel-data" style="border-color:black">
        <ul class="list-group">
            @foreach ($kelas as $item)
                <li class="list-group-item">
                    <h4 class="text-secondary">
                        <b>
                            <a href="">{{ $item->nama_kelas }}</a>
                        </b> <span class="badge badge-warning">50%</span>
                    </h4>
                    <h5>Wali Kelas : {{ $item->wali_kelas }}</h5>
                    <div class="info d-flex flex-row">
                        <div class="alert alert-info" role="alert">
                            Jumlah Siswa <span class="badge badge-light">{{ $item->students->count()}}</span>
                        </div>
                        <div class="alert alert-primary ml-3" role="alert">
                            Siswa yang absen penuh <span class="badge badge-light">15</span>
                        </div>
                    </div>
                    <table class="table" style="table-layout : fixed">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col" colspan="3">Mapel</th>
                                <th scope="col" colspan="2"><i class="fa-solid fa-hourglass-start mr-1"></i>Mulai</th>
                                <th scope="col" colspan="2"><i class="fa-solid fa-hourglass-end mr-1"></i>Berakhir
                                </th>
                                <th scope="col" colspan="2"><i class="fa-solid fa-percent mr-1"></i>Siswa Absen</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwalHariIni->where('id_kelas', '=', $item->id) as $jadwal)
                                @if (date('H:i:s') >= $jadwal->waktu_mulai && date('H:i:s') <= $jadwal->waktu_berakhir)
                                    <tr class="bg-info row_jadwal text-white"
                                        onclick="window.location.href = '{{ url('/dataJadwalIni/' . $jadwal->classroom->id . '/' . $jadwal->id) }}'">
                                    @else
                                    <tr class="row_jadwal"
                                        onclick="window.location.href = '{{ url('/dataJadwalIni/' . $jadwal->classroom->id . '/' . $jadwal->id) }}'">
                                @endif

                                <td scope="col">{{ $loop->iteration }}</td>
                                <td scope="col" colspan="3">
                                    {{ $jadwal->mapel }}</td>
                                <td scope="col" colspan="2">{{ $jadwal->waktu_mulai }}</td>
                                <td scope="col" colspan="2">{{ $jadwal->waktu_berakhir }}</td>
                                <td scope="col" colspan="2">100%</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
