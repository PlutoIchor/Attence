@extends('layouts.main')

@section('content')
    <div class="header d-flex flex-row align-items-center mb-3 text-primary">
        <i class="fa-solid fa-calendar-check mr-2" style="font-size: 30px"></i>
        <h2 class="mb-0">Validasi Kehadiran<h2>
    </div>
    @if (!$validations)
        <h3 class="text-secondary" style="text-align: center">-- Tidak ada yang ingin mengabsen --</h3>
    @else
        <div class="tabel-data p-3 mb-3 border rounded" style="border-color:black">
            <div class="info d-flex flex-row">
                <div class="alert alert-info" role="alert">
                    Inbox <span class="badge badge-light">{{ $validations->count() }}</span>
                </div>
                <div class="alert alert-success ml-3" role="alert">
                    Hadir <span
                        class="badge badge-light">{{ $validations->where('keterangan', '=', 'Hadir')->count() }}</span>
                </div>
                <div class="alert alert-warning ml-3" role="alert">
                    Izin <span
                        class="badge badge-light">{{ $validations->where('keterangan', '=', 'Izin')->count() }}</span>
                </div>
                <div class="alert alert-danger ml-3" role="alert">
                    Sakit <span
                        class="badge badge-light">{{ $validations->where('keterangan', '=', 'Sakit')->count() }}</span>
                </div>
            </div>
            <table class="table" style="table-layout: fixed">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col" colspan="3">Nama</th>
                        <th scope="col">Kelas</th>
                        <th scope="col" colspan="2">Tanggal</th>
                        <th scope="col" colspan="3">Jadwal</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col" colspan="3">Approve</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($validations as $validation)
                        <tr>
                            <td scope="col">{{ $loop->iteration }}</td>
                            <td scope="col" colspan="3">{{ $validation->student->nama_lengkap }}</td>
                            <td scope="col">{{ $validation->student->classroom->nama_kelas }}</td>
                            <td scope="col" colspan="2">{{ $validation->created_at->format("d-m-Y") }}</td>
                            <td scope="col" colspan="3">{{ $validation->schedule->mapel }}
                                ({{ $validation->schedule->waktu_mulai }} : {{ $validation->schedule->waktu_berakhir }})
                            </td>
                            @if ($validation->lampiran)
                                <!-- Button trigger modal -->
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModalCenter">
                                        {{ $validation->keterangan }}
                                    </button>
                                </td>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <img class="m-auto" src="{{ asset('storage/' . $validation->lampiran) }}"
                                                    alt="" style="height: 250px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <td scope="col">{{ $validation->keterangan }}</td>
                            @endif
                            <td scope="col" colspan="3">
                                <button type="button" class="btn btn-success" onclick="window.location.href='{{ url('/buatKehadiranSiswa/'.$validation->id) }}'">Accept</button>

                                {{-- Kalau tidak diaccept, admin akan memberi keterangan sendiri --}}
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#tolakAbsen">
                                    Tolak
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="tolakAbsen" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Berikan keterangan absen
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form
                                                    action="{{ url('/buatKeteranganSiswa/'.$validation->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Status</label>
                                                        <select class="form-control" id="exampleFormControlSelect1"
                                                            name="keterangan">
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
