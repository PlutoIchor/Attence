@extends('layouts.main')

@section('content')
    {{-- Status --}}
    <div class="row">
        <div class="col-sm">
            <div class="card bg-success">
                <div class="card-body d-flex flex-row">
                    <div class="logo w-50">
                        <i class="fa-solid fa-chalkboard-user mr-2" style="font-size: 70px; color:lightgray"></i>
                    </div>
                    <div class="info_stat d-flex justify-content-center flex-column align-items-center w-50">
                        <h3>{{ $jml_kelas }}</h3>
                        <h5>Kelas</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card bg-danger">
                <div class="card-body d-flex flex-row">
                    <div class="logo w-50">
                        <i class="fa-solid fa-person-chalkboard mr-2" style="font-size: 70px; color:lightgray"></i>
                    </div>
                    <div class="info_stat d-flex justify-content-center flex-column align-items-center w-50">
                        <h3>{{ $jml_siswa }}</h3>
                        <h5>Siswa</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card bg-primary">
                <div class="card-body d-flex flex-row">
                    <div class="logo w-50">
                        <i class="fa-solid fa-calendar-check mr-2" style="font-size: 70px; color:lightgray"></i>
                    </div>
                    <div class="info_stat d-flex justify-content-center flex-column align-items-center w-50">
                        <h3>72%</h3>
                        <h5>Sudah Absen</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card bg-danger">
                <div class="card-body d-flex flex-row">
                    <div class="logo w-50">
                        <i class="fa-solid fa-person-chalkboard mr-2" style="font-size: 70px; color:lightgray"></i>
                    </div>
                    <div class="info_stat d-flex justify-content-center flex-column align-items-center w-50">
                        <h3>{{ $jml_siswa }}</h3>
                        <h5>Alfa</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Statistik --}}
    <div>
    @endsection
