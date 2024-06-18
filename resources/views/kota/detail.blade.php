@extends('adminlte.layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col">
                        <h1 class="m-0">Detail Kelompok Tugas Akhir</h1>
                    </div>
                    <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
                        <span class="badge badge-pill badge-success" style="font-size: 1.0em;">
                            <i class="nav-icon fas fa-check"></i>
                            Sudah Mengumpulkan
                        </span>
                        <span class="badge badge-pill badge-secondary" style="font-size: 1.0em;">
                            <i class="nav-icon fas fa-times"></i>
                            Belum Mengumpulkan
                        </span>
                    </div>
                </div><!-- /.row -->
            <hr/>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <h3 style="font-weight: bold;">KoTA <?= $kota->nama_kota; ?></h3>
            <h4><?= $kota->judul; ?></h4>
            <br>
            <!-- <table id="personTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th><h4 style="font-weight: bold;">Anggota</h4></th>
                        <th><h4 style="font-weight: bold;">NIM</h4></th>
                        <th><h4 style="font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4></th>
                        <th><h4 style="font-weight: bold;">Pembimbing</h4></th>
                        <th><h4 style="font-weight: bold;">NIP</h4></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mahasiswa as $m)
                        <tr>
                            <td><h5>{{ $m->name }}</h5></td>
                            <td><h5>{{ $m->nomor_induk }}</h5></td>
                            <td><h5>&nbsp;</h5></td>
                        </tr>
                    @endforeach
                    @foreach($dosen as $d)
                        <tr>
                            <td><h5>{{ $d->name }}</h5></td>
                            <td><h5>{{ $d->nomor_induk }}</h5></td>
                            <td><h5>&nbsp;</h5></td>
                        </tr>
                    @endforeach
                </tbody>
            </table> -->
            <div class="row">
                <div class="col">
                    <h4>Mahasiswa</h4>
                    <ul>
                        @foreach($mahasiswa as $mhs)
                            <li><h5>{{ $mhs->name }}</h5></li>
                        @endforeach
                    </ul>
                </div> 
                <div class="col">
                    <h4>NIM</h4>
                    <ul>
                        @foreach($mahasiswa as $mhs)
                            <li><h5>{{ $mhs->nomor_induk }}</h5></li>
                        @endforeach
                    </ul>
                </div>  
                <div class="col">
                    <h4>Dosen Pembimbing</h4>
                    <ul>
                        @foreach($dosen as $dsn)
                            @if($dsn)
                                <li><h5>{{ $dsn->name }}</h5></li>
                            @else
                                <li>Data tidak ditemukan</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="col">
                    <h4>NIP</h4>
                    <ul>
                        @foreach($dosen as $dsn)
                            @if($dsn)
                                <li><h5>{{ $dsn->nomor_induk }}</h5></li>
                            @else
                                <li>Data tidak ditemukan</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <br>
            <br> 
        </div>
    </div>
        <div class="alert" role="alert" style="background-color: #D2DCF2;">
            <div class="row">
                <div class="col">
                    Seminar 1
                </div>
                <div class="col-5 d-md-flex justify-content-md-end">
                    <span class="badge bg-primary">
                        Selesai
                    </span>
                </div>
                <div class="col justify-content-md-end">
                    <div class="progress"  style="height: 25px;">
                        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">100%</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row row-cols-auto">
                @foreach ($seminar1 as $masterArtefak)
                    @php
                        $isSubmitted = false;
                        foreach ($artefakKota as $artefak) {
                            if ($artefak->id_artefak == $masterArtefak->id) {
                                $isSubmitted = true;
                                break;
                            }
                        }
                    @endphp
                    <div class="row">
                        <div class="col mr-2">
                            @if ($isSubmitted)
                                <span class="badge badge-pill badge-success">
                                    <i class="nav-icon fas fa-file"></i>
                                    {{ $masterArtefak->nama_artefak }}
                                </span>
                            @else
                                <span class="badge badge-pill badge-secondary">
                                    <i class="nav-icon fas fa-file"></i>
                                    {{ $masterArtefak->nama_artefak }}
                                </span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
        <br>
        
        <div class="alert" role="alert" style="background-color: #D2DCF2;">
            <div class="row">
                <div class="col">
                    Seminar 2
                </div>
                <div class="col-5 d-md-flex justify-content-md-end">
                    <div class="mr-2">
                        <span class="badge bg-light text-dark me-3">
                            Jumlah Bimbingan : {{ $progressStage1Count }}
                        </span>
                    </div>
                    <div>
                        <span class="badge bg-success">
                            Disetujui
                        </span>
                    </div>
                </div>
                <div class="col justify-content-md-end">
                    <div class="progress"  style="height: 25px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">100%</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row row-cols-auto">
                @foreach ($seminar2 as $masterArtefak)
                    @php
                        $isSubmitted = false;
                        foreach ($artefakKota as $artefak) {
                            if ($artefak->id_artefak == $masterArtefak->id) {
                                $isSubmitted = true;
                                break;
                            }
                        }
                    @endphp
                    <div class="row">
                        <div class="col mr-2">
                            @if ($isSubmitted)
                                <span class="badge badge-pill badge-success">
                                    <i class="nav-icon fas fa-file"></i>
                                    {{ $masterArtefak->nama_artefak }}
                                </span>
                            @else
                                <span class="badge badge-pill badge-secondary">
                                    <i class="nav-icon fas fa-file"></i>
                                    {{ $masterArtefak->nama_artefak }}
                                </span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <br>

        <div class="alert" role="alert" style="background-color: #D2DCF2;">
            <div class="row">
                <div class="col">
                    Seminar 3
                </div>
                <div class="col-5 d-md-flex justify-content-md-end">
                    <div class="mr-2">
                        <span class="badge bg-light text-dark me-3">
                            Jumlah Bimbingan : {{ $progressStage2Count }}
                        </span>
                    </div>
                    <div>
                        <span class="badge bg-danger">
                            Belum Disetujui
                        </span>
                    </div>
                </div>
                <div class="col justify-content-md-end">
                    <div class="progress"  style="height: 25px;">
                        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">0%</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row row-cols-auto">
                @foreach ($seminar3 as $masterArtefak)
                    @php
                        $isSubmitted = false;
                        foreach ($artefakKota as $artefak) {
                            if ($artefak->id_artefak == $masterArtefak->id) {
                                $isSubmitted = true;
                                break;
                            }
                        }
                    @endphp
                    <div class="row">
                        <div class="col mr-2">
                            @if ($isSubmitted)
                                <span class="badge badge-pill badge-success">
                                    <i class="nav-icon fas fa-file"></i>
                                    {{ $masterArtefak->nama_artefak }}
                                </span>
                            @else
                                <span class="badge badge-pill badge-secondary">
                                    <i class="nav-icon fas fa-file"></i>
                                    {{ $masterArtefak->nama_artefak }}
                                </span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <br>

        <div class="alert" role="alert" style="background-color: #D2DCF2;">
            <div class="row">
                <div class="col">
                    Sidang
                </div>
                <div class="col-5 d-md-flex justify-content-md-end">
                    <div class="mr-2">
                        <span class="badge bg-light text-dark me-3">
                            Jumlah Bimbingan : {{ $progressStage3Count }}
                        </span>
                    </div>
                    <div>
                        <span class="badge bg-danger">
                            Belum Disetujui
                        </span>
                    </div>
                </div>
                <div class="col justify-content-md-end">
                    <div class="progress"  style="height: 25px;">
                        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">0%</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row row-cols-auto">
                @foreach ($sidang as $masterArtefak)
                    @php
                        $isSubmitted = false;
                        foreach ($artefakKota as $artefak) {
                            if ($artefak->id_artefak == $masterArtefak->id) {
                                $isSubmitted = true;
                                break;
                            }
                        }
                    @endphp
                    <div class="row">
                        <div class="col mr-2">
                            @if ($isSubmitted)
                                <span class="badge badge-pill badge-success">
                                    <i class="nav-icon fas fa-file"></i>
                                    {{ $masterArtefak->nama_artefak }}
                                </span>
                            @else
                                <span class="badge badge-pill badge-secondary">
                                    <i class="nav-icon fas fa-file"></i>
                                    {{ $masterArtefak->nama_artefak }}
                                </span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <br>
        <br>
        <br>
@endsection      