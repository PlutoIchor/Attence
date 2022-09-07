@extends('layouts.main')

@section('content')
    <div class="header d-flex flex-row align-items-center mb-3">
        <i class="fa-solid fa-calendar-check mr-2" style="font-size: 30px"></i>
        <?php
        $today = getdate()['wday'];
        $hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        ?>
        <h2 class="mb-0">{{ $isi_kelas[0]->classroom->nama_kelas }} | {{ $hari[$today] }} | {{ $mapel->mapel }}</h2>
    </div>
    <div class="tabel-data p-3 mb-5 border rounded" style="border-color:black">
        <div class="info d-flex flex-row">
            <div class="alert alert-success" role="alert">
                Siswa yang hadir <span class="badge badge-light">20</span>
            </div>
            <div class="alert alert-warning ml-3" role="alert">
                Siswa yang izin <span class="badge badge-light">3</span>
            </div>
            <div class="alert alert-danger ml-3" role="alert">
                Siswa yang tidak hadir <span class="badge badge-light">10</span>
            </div>
        </div>
        <table class="table" style="table-layout: fixed">
            <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIS</th>
                    <th scope="col" colspan="2">Nama Lengkap</th>
                    <th scope="col" colspan="2">Absen</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($isi_kelas as $siswa)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $siswa->NIS }}</td>
                        <td colspan="2">{{ $siswa->nama_lengkap }}</td>
                        @if ($data_absen->where('id_siswa', '=', $siswa->id)->count() > 0)
                            <td colspan="2" class="text-success">Sudah Absen</td>
                        @else
                            <td colspan="2">Belum Absen</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
