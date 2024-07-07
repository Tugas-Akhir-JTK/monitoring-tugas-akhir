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
                    @if (auth()->user()->role == "1" || auth()->user()->role == "3")
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
                    @endif
                </div><!-- /.row -->
            <hr/>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            @foreach ($kotas as $kota)
                <h3><strong>KoTA {{ $kota->nama_kota }}</strong></h3>
                <h4>{{ $kota->judul }}</h4>
                <br>
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
            @endforeach
        </div>
    </div>
        <div class="alert" role="alert" style="background-color: #D2DCF2;">
            <div class="row">
                <div class="col">
                    Seminar 1
                </div>
                <div class="col-5 d-md-flex justify-content-md-end">
                @if (auth()->user()->role == "2")
                    <div class="form-group">
                        <select class="form-control-sm" id="statusControlSelect" onchange="changeBackgroundColor()">
                            <option value="belum-disetujui" class="badge badge-danger selected">Belum Disetujui</option>
                            <option value="disetujui" class="badge badge-success">Disetujui</option>
                            <option value="selesai" class="badge badge-primary">Selesai</option>
                        </select>
                    </div>
                @endif
                @if (auth()->user()->role == "1" || auth()->user()->role == "3")
                    <div>
                    @foreach($tahapan_progres as $item)
                    @if($item->id_master_tahapan_progres == 1)
                        @if($item->status == 'belum-disetujui')
                        <span id="selectedBadge" class="badge bg-danger">Belum Disetujui</span>
                        @elseif($item->status == 'disetujui')
                        <span id="selectedBadge" class="badge bg-success">Disetujui</span>
                        @elseif($item->status == 'selesai')
                        <span id="selectedBadge" class="badge bg-primary">Selesai</span>
                        @elseif($item->status == 'on_progres')
                        <span id="selectedBadge" class="badge bg-warning">On Progres</span>
                        @endif
                    @endif
                    @endforeach
                    </div>
                @endif
                </div>
                <div class="col justify-content-md-end">
                    <div class="progress"  style="height: 25px;">
                        <div class="progress-bar" role="progressbar" style="width: 70%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">70%</div>
                    </div>
                </div>
            </div>
        </div>
        @if (auth()->user()->role == "1" || auth()->user()->role == "3")
        <div class="container-fluid">
            <div class="row row-cols-auto">
                @foreach ($seminar1 as $masterArtefak)
                    @php
                        $isSubmitted = false;
                        $submittedFile = null;
                        foreach ($artefakKota as $artefak) {
                            if ($artefak->nama_artefak == $masterArtefak->nama_artefak) {
                                $isSubmitted = true;
                                $submittedFile = $artefak->file_pengumpulan; // Ambil path file pengumpulan
                                $submittedFileId = $artefak->nama_artefak;
                                break;
                            }
                        }
                    @endphp
                    <div class="row">
                        <div class="col mr-2">
                            @if ($isSubmitted)
                                <a href="{{ route('home.showFile', $submittedFileId) }}">
                                <span class="badge badge-pill badge-success">
                                    <i class="nav-icon fas fa-file"></i>
                                        {{ $masterArtefak->nama_artefak }}
                                    </span>
                                </a>
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
        @endif
        
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
                    @if (auth()->user()->role == "2")
                        <div class="form-group">
                            <select class="form-control-sm" id="statusControlSelect" onchange="changeBackgroundColor1()">
                                <option value="belum-disetujui" class="badge badge-danger selected">Belum Disetujui</option>
                                <option value="disetujui" class="badge badge-success">Disetujui</option>
                                <option value="selesai" class="badge badge-primary">Selesai</option>
                            </select>
                        </div>
                    @endif
                    @if (auth()->user()->role == "1" || auth()->user()->role == "3")
                        <div>
                        @foreach($tahapan_progres as $item)
                        @if($item->id_master_tahapan_progres == 2)
                            @if($item->status == 'belum-disetujui')
                            <span id="selectedBadge" class="badge bg-danger">Belum Disetujui</span>
                            @elseif($item->status == 'disetujui')
                            <span id="selectedBadge" class="badge bg-success">Disetujui</span>
                            @elseif($item->status == 'selesai')
                            <span id="selectedBadge" class="badge bg-primary">Selesai</span>
                            @elseif($item->status == 'on_progres')
                            <span id="selectedBadge" class="badge bg-warning">On Progres</span>
                            @endif
                        @endif
                        @endforeach
                        </div>
                    @endif
                    </div>
                <div class="col justify-content-md-end">
                    <div class="progress"  style="height: 25px;">
                        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">0%</div>
                    </div>
                </div>
            </div>
        </div>
        @if (auth()->user()->role == "1" || auth()->user()->role == "3")
        <div class="container-fluid">
            <div class="row row-cols-auto">
                @foreach ($seminar2 as $masterArtefak)
                    @php
                        $isSubmitted = false;
                        foreach ($artefakKota as $artefak) {
                            if ($artefak->nama_artefak == $masterArtefak->nama_artefak) {
                                $isSubmitted = true;
                                $submittedFileId = $artefak->nama_artefak;
                                break;
                            }
                        }
                    @endphp
                    <div class="row">
                        <div class="col mr-2">
                            @if ($isSubmitted)
                                <a href="{{ route('home.showFile', $submittedFileId) }}">
                                <span class="badge badge-pill badge-success">
                                    <i class="nav-icon fas fa-file"></i>
                                        {{ $masterArtefak->nama_artefak }}
                                    </span>
                                </a>
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
        @endif
        
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
                    @if (auth()->user()->role == "2")
                        <div class="form-group">
                            <select class="form-control-sm" id="statusControlSelect" onchange="changeBackgroundColor1()">
                                <option value="belum-disetujui" class="badge badge-danger selected">Belum Disetujui</option>
                                <option value="disetujui" class="badge badge-success">Disetujui</option>
                                <option value="selesai" class="badge badge-primary">Selesai</option>
                            </select>
                        </div>
                    @endif
                    @if (auth()->user()->role == "1" || auth()->user()->role == "3")
                        <div>
                        @foreach($tahapan_progres as $item)
                        @if($item->id_master_tahapan_progres == 3)
                            @if($item->status == 'belum-disetujui')
                            <span id="selectedBadge" class="badge bg-danger">Belum Disetujui</span>
                            @elseif($item->status == 'disetujui')
                            <span id="selectedBadge" class="badge bg-success">Disetujui</span>
                            @elseif($item->status == 'selesai')
                            <span id="selectedBadge" class="badge bg-primary">Selesai</span>
                            @elseif($item->status == 'on_progres')
                            <span id="selectedBadge" class="badge bg-warning">On Progres</span>
                            @endif
                        @endif
                        @endforeach
                        </div>
                    @endif
                </div>
                <div class="col justify-content-md-end">
                    <div class="progress"  style="height: 25px;">
                        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">0%</div>
                    </div>
                </div>
            </div>
        </div>
        @if (auth()->user()->role=="1" || auth()->user()->role == "3")
        <div class="container-fluid">
            <div class="row row-cols-auto">
                @foreach ($seminar3 as $masterArtefak)
                    @php
                        $isSubmitted = false;
                        foreach ($artefakKota as $artefak) {
                            if ($artefak->nama_artefak == $masterArtefak->nama_artefak) {
                                $isSubmitted = true;
                                $submittedFileId = $artefak->nama_artefak;
                                break;
                            }
                        }
                    @endphp
                    <div class="row">
                        <div class="col mr-2">
                            @if ($isSubmitted)
                                <a href="{{ route('home.showFile', $submittedFileId) }}">
                                <span class="badge badge-pill badge-success">
                                    <i class="nav-icon fas fa-file"></i>
                                        {{ $masterArtefak->nama_artefak }}
                                    </span>
                                </a>
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
        @endif

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
                    @if (auth()->user()->role == "2")
                        <div class="form-group">
                            <select class="form-control-sm" id="statusControlSelect" onchange="changeBackgroundColor3()">
                                <option value="belum-disetujui" class="badge badge-danger selected">Belum Disetujui</option>
                                <option value="disetujui" class="badge badge-success">Disetujui</option>
                                <option value="selesai" class="badge badge-primary">Selesai</option>
                            </select>
                        </div>
                    @endif
                    @if (auth()->user()->role == "1" || auth()->user()->role == "3")
                        <div>
                        @foreach($tahapan_progres as $item)
                        @if($item->id_master_tahapan_progres == 4)
                            @if($item->status == 'belum-disetujui')
                            <span id="selectedBadge" class="badge bg-danger">Belum Disetujui</span>
                            @elseif($item->status == 'disetujui')
                            <span id="selectedBadge" class="badge bg-success">Disetujui</span>
                            @elseif($item->status == 'selesai')
                            <span id="selectedBadge" class="badge bg-primary">Selesai</span>
                            @elseif($item->status == 'on_progres')
                            <span id="selectedBadge" class="badge bg-warning">On Progres</span>
                            @endif
                        @endif
                        @endforeach
                        </div>
                    @endif
                </div>
                <div class="col justify-content-md-end">
                    <div class="progress"  style="height: 25px;">
                        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">0%</div>
                    </div>
                </div>
            </div>
        </div>
        @if (auth()->user()->role=="1" || auth()->user()->role == "3")
        <div class="container-fluid">
            <div class="row row-cols-auto">
                @foreach ($sidang as $masterArtefak)
                    @php
                        $isSubmitted = false;
                        foreach ($artefakKota as $artefak) {
                            if ($artefak->nama_artefak == $masterArtefak->nama_artefak) {
                                $isSubmitted = true;
                                $submittedFileId = $artefak->nama_artefak;
                                break;
                            }
                        }
                    @endphp
                    <div class="row">
                        <div class="col mr-2">
                            @if ($isSubmitted)
                                <a href="{{ route('home.showFile', $submittedFileId) }}">
                                <span class="badge badge-pill badge-success">
                                    <i class="nav-icon fas fa-file"></i>
                                        {{ $masterArtefak->nama_artefak }}
                                    </span>
                                </a>
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
        @endif
        <br>
        <br>
        <br>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        changeBackgroundColor(); // Memanggil fungsi untuk mengatur warna latar belakang awal
    });

    function changeBackgroundColor() {
        var selectElement = document.getElementById("statusControlSelect");
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        
        // Menghapus kelas latar belakang sebelumnya
        selectElement.classList.remove("bg-danger", "bg-success", "bg-primary");
        
        // Menambahkan kelas latar belakang sesuai dengan opsi yang dipilih
        if (selectedOption.value === "belum-disetujui") {
            selectElement.classList.add("bg-danger");
        } else if (selectedOption.value === "disetujui") {
            selectElement.classList.add("bg-success");
        } else if (selectedOption.value === "selesai") {
            selectElement.classList.add("bg-primary");
        }
    }

</script>
@endsection
