@extends('layouts.main')

@section('content')
    <div class="header d-flex flex-row align-items-center mb-3 text-primary">
        <i class="fa-solid fa-calendar-check mr-2" style="font-size: 30px"></i>
        <h2 class="mb-0">Absen {{ $nama_kelas }}</h2>
    </div>
    @if (\Session::has('successAdd'))
        <div class="alert alert-success ml-2 h-100 d-flex align-items-center">
            {{ \Session::get('successAdd') }}
        </div>
    @endif
    @if (\Session::has('successUpdate'))
        <div class="alert alert-success ml-2 h-100 d-flex align-items-center">
            {{ \Session::get('successUpdate') }}
        </div>
    @endif
    @if (\Session::has('successDelete'))
        <div class="alert alert-success ml-2 h-100 d-flex align-items-center">
            {{ \Session::get('successDelete') }}
        </div>
    @endif
    @foreach ($hari as $item)
        <div class="tabel-data p-3 mb-3 border rounded" style="border-color:black">
            <div class="header d-flex flex-row">
                <h3>{{ $item }}</h3>
                <button class="btn btn-secondary position-absolute" data-toggle="modal"
                    data-target="#tmbh_jadwal_{{ $item }}" style="margin-left: 95px">+</button>
            </div>
            {{-- Modal Tambah Jadwal --}}
            <div class="modal fade" id="tmbh_jadwal_{{ $item }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Tambah Jadwal Hari {{ $item }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('/tambah_jadwal/' . $id_kelas . '/' . $item) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="mapel">Mata Pelajaran</label>
                                    <input type="text" class="form-control" id="mapel" placeholder="Mata Pelajaran"
                                        name="mapel" required>
                                </div>
                                <div class="form-group">
                                    <label for="waktu_mulai">Waktu Mulai</label>
                                    <input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai" required>
                                </div>
                                <div class="form-group">
                                    <label for="waktu_berakhir">Waktu Berakhir</label>
                                    <input type="time" class="form-control" id="waktu_berakhir" name="waktu_berakhir"
                                        required>
                                </div>
                                <button type="submit" class="btn btn-info mt-2">Tambah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="isi">
                <table class="table" style="table-layout : fixed">
                    @if ($jadwals->where('hari', '=', $item)->count() > 0)
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col" colspan="2"><i class="fa-solid fa-book mr-1"></i>Mapel</th>
                                <th scope="col" colspan="2"><i class="fa-solid fa-hourglass-start mr-1"></i>Waktu
                                    Mulai</th>
                                <th scope="col" colspan="2"><i class="fa-solid fa-hourglass-end mr-1"></i>Waktu
                                    Berakhir</th>
                                <th scope="col" colspan="2"><i class="fa-solid fa-circle-question mr-1"></i>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwals->where('hari', '=', $item) as $jadwal)
                                <tr>
                                    <td scope="col">{{ $loop->iteration }}</td>
                                    <td scope="col" colspan="2">{{ $jadwal->mapel }}</td>
                                    <td scope="col" colspan="2">{{ $jadwal->waktu_mulai }}</td>
                                    <td scope="col" colspan="2">{{ $jadwal->waktu_berakhir }}</td>
                                    <td scope="col" colspan="2">
                                        <button type="button" class="btn btn-info mb-3 p-2 edit" data-toggle="modal"
                                            data-target="#edit_jadwal{{ $jadwal->id }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>

                                        <!-- Modal Edit-->
                                        <div class="modal fade" id="edit_jadwal{{ $jadwal->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Jadwal</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form
                                                            action="{{ url('/edit_jadwal/' . $id_kelas . '/' . $jadwal->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label>Mata Pelajaran</label>
                                                                <input type="text" class="form-control" name="mapel"
                                                                    placeholder="Mata Pelajaran"
                                                                    value="{{ $jadwal->mapel }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label><i
                                                                        class="fa-solid fa-hourglass-start mr-1"></i>Mulai</label>
                                                                <input type="time" class="form-control"
                                                                    name="waktu_mulai"
                                                                    value="{{ $jadwal->waktu_mulai }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label><i
                                                                        class="fa-solid fa-hourglass-start mr-1"></i>Waktu
                                                                    Berakhir</label>
                                                                <input type="time" class="form-control"
                                                                    name="waktu_berakhir"
                                                                    value="{{ $jadwal->waktu_berakhir }}">
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">
                                                                Edit
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="button" class="btn btn-info mb-3 p-2 delete" data-toggle="modal"
                                            data-target="#hapus_jadwal{{ $jadwal->id }}">
                                            <i class="fa-solid fa-eraser"></i>
                                        </button>
                                        <!-- Modal Delete-->
                                        <div class="modal fade" id="hapus_jadwal{{ $jadwal->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content pt-4">
                                                    <form
                                                        action="{{ url('/hapus_jadwal/' . $id_kelas . '/' . $jadwal->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-body text-center">
                                                            <i class="fa-regular fa-trash-can"
                                                                style="color: red; font-size:100px;"></i>
                                                            <h5 class="mt-3"><b>Apakah anda yakin?</b></h5>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @else
                        Belum ada absen pada hari {{ $item }}
                    @endif

                </table>
            </div>
        </div>
    @endforeach
@endsection
