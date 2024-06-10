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
                        <span class="badge rounded-pill bg-success" style="font-size: 1.0em;">
                            <i class="nav-icon fas fa-check"></i>
                            Sudah Mengumpulkan
                        </span>
                        <span class="badge rounded-pill bg-secondary" style="font-size: 1.0em;">
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
            <table id="personTable" width="100%" cellspacing="0">
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
                    @foreach($kota->users as $user)
                        <tr>
                            <td><h5>{{ $user->name }}</h5></td>
                            <td><h5>{{ $user->nomor_induk }}</h5></td>
                            <td><h5>&nbsp;</h5></td>
                        </tr>
                        <tr>
                            <td><h5><?= $kota->nama_mahasiswa_satu; ?></h5></td>
                            <td><h5><?= $kota->nim_satu;?></h5></td>
                            <td><h5>&nbsp;</h5></td>
                            <td><h5><?= $kota->pembimbing_satu; ?></h5></td>
                            <td><h5><?= $kota->nip_satu;?></h5></td>
                        </tr>
                        <tr>
                            <td><h5><?= $kota->nama_mahasiswa_dua; ?></h5></td>
                            <td><h5><?= $kota->nim_dua;?></h5></td>
                            <td><h5>&nbsp;</h5></td>
                            <td><h5><?= $kota->pembimbing_dua; ?></h5></td>
                            <td><h5><?= $kota->nip_dua;?></h5></td>
                        </tr>
                        <tr>
                            <td><h5><?= $kota->nama_mahasiswa_tiga; ?></h5></td>
                            <td><h5><?= $kota->nim_tiga;?></h5></td>
                            <td><h5>&nbsp;</h5></td>
                            <td><h5></h5></td>
                            <td><h5></h5></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <br> 
        </div>
    </div>
        <div class="alert alert-primary" role="alert">
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
                <div class="col">
                    <span class="badge rounded-pill bg-success">
                        <i class="nav-icon fas fa-file"></i>
                        FTA 01
                    </span>
                </div>
                <div class="col">
                    <span class="badge rounded-pill bg-success">
                        <i class="nav-icon fas fa-file"></i>
                        FTA 02
                    </span>
                </div>
                <div class="col">
                    <span class="badge rounded-pill bg-success">
                        <i class="nav-icon fas fa-file"></i>
                        FTA 03
                    </span>
                </div>
                <div class="col">
                    <span class="badge rounded-pill bg-success">
                        <i class="nav-icon fas fa-file"></i>
                        FTA 04
                    </span>
                </div>
                <div class="col">
                    <span class="badge rounded-pill bg-success">
                        <i class="nav-icon fas fa-file"></i>
                        FTA 05
                    </span>
                </div>
                <div class="col">
                    <span class="badge rounded-pill bg-success">
                        <i class="nav-icon fas fa-file"></i>
                        FTA 05a
                    </span>
                </div>
            </div>
        </div>
        
        <br>
        
        <div class="alert alert-primary" role="alert">
            <div class="row">
                <div class="col">
                    Seminar 2
                </div>
                <div class="col-5 d-md-flex justify-content-md-end">
                    <div>
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
                <div class="col">
                    <span class="badge rounded-pill bg-success">
                        <i class="nav-icon fas fa-file"></i>
                        FTA 06
                    </span>
                </div>
                <div class="col">
                    <span class="badge rounded-pill bg-success">
                        <i class="nav-icon fas fa-file"></i>
                        FTA 06 (Revisi)
                    </span>
                </div>
                <div class="col">
                    <span class="badge rounded-pill bg-success">
                        <i class="nav-icon fas fa-file"></i>
                        FTA 07
                    </span>
                </div>
                <div class="col">
                    <span class="badge rounded-pill bg-success">
                        <i class="nav-icon fas fa-file"></i>
                        FTA 08
                    </span>
                </div>
                <div class="col">
                    <span class="badge rounded-pill bg-success">
                        <i class="nav-icon fas fa-file"></i>
                        FTA 09
                    </span>
                </div>
                <div class="col">
                    <span class="badge rounded-pill bg-success">
                        <i class="nav-icon fas fa-file"></i>
                        FTA 09a
                    </span>
                </div>
            </div>
        </div>

        <br>

        <div class="alert alert-primary" role="alert">
            <div class="row">
                <div class="col">
                    Seminar 3
                </div>
                <div class="col-5 d-md-flex justify-content-md-end">
                    <div>
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
                <div class="col">
                    <span class="badge rounded-pill bg-secondary">
                        <i class="nav-icon fas fa-file"></i>
                        FTA 10
                    </span>
                </div>
                <div class="col">
                    <span class="badge rounded-pill bg-secondary">
                        <i class="nav-icon fas fa-file"></i>
                        FTA 10 (Revisi)
                    </span>
                </div>
                <div class="col">
                    <span class="badge rounded-pill bg-secondary">
                        <i class="nav-icon fas fa-file"></i>
                        FTA 11
                    </span>
                </div>
                <div class="col">
                    <span class="badge rounded-pill bg-secondary">
                        <i class="nav-icon fas fa-file"></i>
                        FTA 12
                    </span>
                </div>
            </div>
        </div>

        <br>

        <div class="alert alert-primary" role="alert">
            <div class="row">
                <div class="col">
                    Sidang
                </div>
                <div class="col-5 d-md-flex justify-content-md-end">
                    <div>
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
                <div class="col">
                    <span class="badge rounded-pill bg-secondary">
                        <i class="nav-icon fas fa-file"></i>
                        FTA 13
                    </span>
                </div>
                <div class="col">
                    <span class="badge rounded-pill bg-secondary">
                        <i class="nav-icon fas fa-file"></i>
                        FTA 14
                    </span>
                </div>
                <div class="col">
                    <span class="badge rounded-pill bg-secondary">
                        <i class="nav-icon fas fa-file"></i>
                        FTA 15
                    </span>
                </div>
                <div class="col">
                    <span class="badge rounded-pill bg-secondary">
                        <i class="nav-icon fas fa-file"></i>
                        FTA 16
                    </span>
                </div>
                <div class="col">
                    <span class="badge rounded-pill bg-secondary">
                        <i class="nav-icon fas fa-file"></i>
                        FTA 17
                    </span>
                </div>
                <div class="col">
                    <span class="badge rounded-pill bg-secondary">
                        <i class="nav-icon fas fa-file"></i>
                        FTA 18
                    </span>
                </div>
                <div class="col">
                    <span class="badge rounded-pill bg-secondary">
                        <i class="nav-icon fas fa-file"></i>
                        FTA 19
                    </span>
                </div>
            </div>
        </div>

        <br>
        <br>
        <br>
@endsection      