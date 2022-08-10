@extends('layouts.main')

@section('content')
    <div class="header d-flex flex-row align-items-center mb-3">
      <i class="fa-solid fa-chalkboard-user mr-2" style="font-size: 30px"></i>
      <h2 class="mb-0">Daftar Kelas</h2>
    </div>
    <div class="tabel-data p-3 mb-3 border rounded" style="border-color:black">
        <!-- Button trigger modal -->
        <div class="table-header d-flex flex-row position-relative mb-3" style="height: 40px">
          <button type="button" class="btn btn-info p-2 h-auto" data-toggle="modal" data-target="#tambah_daftarKelas">
            Tambah Kelas
          </button>
          @if (count($errors) > 0)
              <div class="alert alert-danger ml-4">
                <ul class="pl-0">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
          @endif
          @if (\Session::has('successAdd'))
              <div class="alert alert-success ml-4 h-100 d-flex align-items-center">
                {{ \Session::get('successAdd') }}
              </div>
          @endif
          @if (\Session::has('successUpdate'))
              <div class="alert alert-success ml-4 h-100 d-flex align-items-center">
                {{ \Session::get('successUpdate') }}
              </div>
          @endif
          <form action="{{ url('/search_kelas') }}" class="position-absolute" style="width:70%; height:100% ;margin-left:30%" method="POST">
            @csrf
            <div class="input-group mb-3">
              <input type="text" class="form-control " placeholder="Search" name="search" value="{{ request('search') }}">
              <div class="input-group-append">
                <button class="btn btn-secondary" type="submit">
                  <i class="fa-solid fa-magnifying-glass"></i>
                </button>
              </div>
            </div>
          </form>
        </div>

        <!-- Modal Tambah-->
        <div class="modal fade" id="tambah_daftarKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">TAMBAH KELAS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{ url('/tambah_kelas') }}" method="POST">
                  @csrf
                  <div class="form-group">
                    <label>Nama Kelas</label>
                    <input type="text" class="form-control" name="nama_kelas" placeholder="Nama Kelas">
                  </div>
                  <div class="form-group">
                    <label>Wali Kelas</label>
                    <input type="text" class="form-control" name="wali_kelas" placeholder="Wali Kelas">
                  </div>
                  <button type="submit" class="btn btn-info mb-3 p-2">
                    Tambah
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
    
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Kelas (ID)</th>
              <th scope="col">Wali Kelas</th>
              <th scope="col">Jumlah Siswa</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td><a style="text-decoration: none" href="{{ url("/isi_kelas/" . $item->id_kelas) }}">{{ $item->nama_kelas }} ({{ $item->id_kelas }})</a></td>
                  <td>{{ $item->wali_kelas }}</td>
                  <td>-</td>
                  <td>
                    <button type="button" class="btn btn-info mb-3 p-2 edit" data-toggle="modal" data-target="#edit_daftarKelas{{ $item->id_kelas }}">
                      <i class="fa-solid fa-pen-to-square" style="font-size: 20px"></i>
                    </button>

                    <!-- Modal Edit-->
                    <div class="modal fade" id="edit_daftarKelas{{ $item->id_kelas }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">EDIT KELAS</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="{{ url('/edit_kelas/'. $item->id_kelas) }}" method="POST">
                              @csrf
                              <div class="form-group">
                                <label>Nama Kelas</label>
                                <input type="text" class="form-control" name="nama_kelas" placeholder="Nama Kelas" value="{{ $item->nama_kelas }}">
                              </div>
                              <div class="form-group">
                                <label>Wali Kelas</label>
                                <input type="text" class="form-control" name="wali_kelas" placeholder="Wali Kelas" value="{{ $item->wali_kelas }}">
                              </div>
                              <button type="submit" class="btn btn-primary">
                                Edit
                              </button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <button type="button" class="btn btn-info mb-3 p-2 delete" data-toggle="modal" data-target="#hapus_kelas{{ $item->id_kelas }}">
                      <i class="fa-solid fa-eraser" style="font-size: 20px"></i>
                    </button>
                    <!-- Modal Delete-->
                    <div class="modal fade" id="hapus_kelas{{ $item->id_kelas }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content pt-4">
                            <form action="{{ url('/hapus_kelas/'. $item->id_kelas) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <div class="modal-body text-center">
                                <i class="fa-regular fa-trash-can" style="color: red; font-size:100px;"></i>
                                <h5 class="mt-3"><b>Apakah anda yakin?</b></h5>
                                <p>Anda tidak akan bisa memulihkan <b>{{ $item->nama_kelas }}</b></p>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
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
        </table>
      </div>
      <div class="d-flex justify-content-center">
        {{ $data->links() }}
      </div>
@endsection