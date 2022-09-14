@extends('layouts.main')

@section('content')
    <div class="header d-flex flex-row align-items-center text-primary mb-3">
        <i class="fa-solid fa-person-chalkboard mr-2" style="font-size: 30px"></i>
        <h2 class="mb-0">{{ $nama_kelas }}({{ $id_kelas }}) | {{ $wali_kelas }}</h2>
    </div>
    @if ($data->count() > 0)
        <div class="jadwal pl-3 mb-2">
            <button type="button" class="btn btn-info"
                onclick="window.location.href='{{ url('/jadwal_absen/' . $id_kelas) }}'"><i
                    class="fa-solid fa-calendar-check mr-2"></i>Jadwal Absen Kelas Ini</button>
        </div>
        <div class="tabel-data p-3 mb-5 border rounded" style="border-color:black">
            <div class="table-header d-flex flex-row position-relative mb-3" style="height: 40px"">
                <div class="table-header d-flex flex-row position-relative mb-3" style="height: 40px">
                    <button type="button" class="btn btn-secondary"
                        onclick="window.location.href='{{ url('/form_tambah_siswa/' . $id_kelas) }}'">
                        Tambah Siswa
                    </button>
                </div>
                {{-- Search Bar --}}
                <form action="{{ url('/search_siswa/' . $id_kelas) }}" class="position-absolute"
                    style="width:70%; height:100% ;margin-left:30%" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control " placeholder="Search" name="search"
                            value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="submit">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="table-body">
                <table class="table" style="table-layout: fixed">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col" colspan="2">NIS</th>
                            <th scope="col" colspan="4">Nama Lengkap</th>
                            <th scope="col">Absen</th>
                            <th scope="col" colspan="3"><i class="fa-solid fa-envelope mr-1"></i>Email</th>
                            <th scope="col" colspan="2"><i class="fa-solid fa-lock mr-1"></i>Password</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; ?>
                        @foreach ($data as $item)
                            {{-- Kalau Perempuan text nya merah --}}
                            @if ($item->jk == 'Perempuan')
                                <tr class="row_siswa text-danger"
                                    onclick="window.location.href='{{ url('/informasi_siswa/' . $item->id) }}'">
                                @else
                                <tr class="row_siswa text-dark"
                                    onclick="window.location.href='{{ url('/informasi_siswa/' . $item->id) }}'">
                            @endif
                            <td>{{ $data->perPage() * ($data->currentPage() - 1) + $count }}</td>
                            <?php $count++; ?>
                            <td colspan="2">{{ $item->NIS }}</td>
                            <td class="nama_siswa" colspan="4">{{ $item->nama_lengkap }}</td>
                            <td>{{ $item->nomor_absen }}</td>
                            <td colspan="3">{{ $item->email }}</td>
                            @if ($item->password == 'Diubah oleh siswa')
                                <td colspan="2" class="text-secondary">- {{ $item->password }} -</td>
                            @else
                                <td colspan="2">{{ $item->password }}</td>
                            @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $data->links() }}
        </div>
    @else
        <hr>
        <h3 style="text-align: center">-- Kelas ini sepi sekali, <a href="{{ url('/form_tambah_siswa/' . $id_kelas) }}"
                class="text-primary">tambahlah</a> anggotanya! --</h3>
        <hr>
    @endif

@endsection
