@extends('siswa.layouts.main')

@section('content')
    <div class="tabel-data p-3 mb-3 border rounded" style="border-color:black">
        <div class="header d-flex flex-row align-items-center mb-4 text-primary">
            @if ($jadwalHariIni->count() < 1)
                <h2 class="mb-0">Anda tidak ada pelajaran hari ini. Bersenang-senang lah!</h2>
            @else
                <i class="fa-solid fa-calendar-check mr-2" style="font-size: 30px"></i>
                <h2 class="mb-0">JADWAL {{ $data_siswa->classroom->nama_kelas }} HARI INI</h2>
            @endif
        </div>
        <table class="table" style="table-layout: fixed">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col" colspan="3">Mapel</th>
                    <th scope="col" colspan="2"><i class="fa-solid fa-hourglass-start mr-1"></i>Mulai</th>
                    <th scope="col" colspan="2"><i class="fa-solid fa-hourglass-end mr-1"></i>Berakhir</th>
                    <th scope="col" colspan="2"><i class="fa-solid fa-clipboard-user mr-1"></i>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwalHariIni as $jadwal)
                    <?php
                    // Mencari absen siswa untuk jadwal ini
                    $waktuMulai = date('Y-m-d ' . $jadwal->waktu_mulai);
                    $waktuBerakhir = date('Y-m-d ' . $jadwal->waktu_berakhir);
                    $absen = $jadwal->attendances->where('id_siswa', '=', $data_siswa->id)->where('created_at', '<', $waktuBerakhir,'AND','created_at','>',$waktuMulai)->first();
                    ?>
                    <tr>
                        <td scope="col">{{ $loop->iteration }}</td>
                        @if (date('H:i:s') >= $jadwal->waktu_mulai && date('H:i:s') <= $jadwal->waktu_berakhir && !$absen)
                            <td scope="col" colspan="3">{{ $jadwal->mapel }}</td>
                            <td scope="col" colspan="2">{{ $jadwal->waktu_mulai }}</td>
                            <td scope="col" colspan="2">{{ $jadwal->waktu_berakhir }}</td>
                            <td scope="col" colspan="2">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" style="margin-left: -20px"
                                    data-toggle="modal" data-target="#exampleModalCenter">
                                    ABSEN SEKARANG
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Absen</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('/absenSekarang/'.$jadwal->id.'/'.$data_siswa->id) }}" method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Status</label>
                                                        <select class="form-control" id="exampleFormControlSelect1" name="keterangan">
                                                            <option value="Hadir">Hadir</option>
                                                            <option value="Izin">Izin</option>
                                                            <option value="Sakit">Sakit</option>
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        @else
                            <td scope="col" colspan="3">{{ $jadwal->mapel }}</td>
                            <td scope="col" colspan="2">{{ $jadwal->waktu_mulai }}</td>
                            <td scope="col" colspan="2">{{ $jadwal->waktu_berakhir }}</td>
                            @if ($jadwal->waktu_mulai > date('H:i:s'))
                                <td scope="col" colspan="2" class="text-secondary">Belum Mulai</td>
                            @else
                                @if (!$absen)
                                    <td scope="col" colspan="2" class="text-danger">Anda tidak hadir</td>
                                @else
                                    <td scope="col" colspan="2" class="text-success">Anda sudah absen</td>
                                @endif
                            @endif
                        @endif
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
