@extends('adminlte.layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col">
                        <h1 class="m-0">Daftar Artefak</h1>
                    </div>
                    <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
                        <form class="me-m   d-2" action="{{ route('artefak.search') }}" method="GET">
                            <input type="text" name="keyword" placeholder="Cari Artefak...">
                            <button class="btn btn-secondary" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                        <!-- <a href="{{ url('/artefak/create') }} "> -->
                            <button type="button" class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#tambahArtefakModal">
                                Tambah
                                <i class="nav-icon fas fa-plus"></i>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="tambahArtefakModal" tabindex="-1" aria-labelledby="tambahArtefakModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('artefak.store') }}" method="POST">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="tambahArtefakModalLabel">Tambah Artefak</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="nama_artefak">Nama Artefak</label>
                                                    <input type="text" class="form-control" id="nama_artefak" name="nama_artefak" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="deskripsi">Deskripsi</label>
                                                    <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kategori_artefak">Kategori Artefak</label>
                                                    <input type="text" class="form-control" id="kategori_artefak" name="kategori_artefak" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tanggal_tenggat">Tanggal Tenggat</label>
                                                    <input type="date" class="form-control" id="tanggal_tenggat" name="tanggal_tenggat" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="waktu_tenggat">Waktu Tenggat</label>
                                                    <input type="time" class="form-control" id="waktu_tenggat" name="waktu_tenggat" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <!-- </a> -->
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


    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row mt-4">
                @foreach($artefaks as $artefak)
                <div class="col-md-4">
                    <div class="card">
                        <h5 class="card-header d-flex justify-content-between align-items-center">
                            <div class="col">{{ $artefak->nama_artefak }}</div>
                            <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
                                <!-- <a href="{{ route('artefak.detail', $artefak->id_artefak) }}">
                                    <i class="nav-icon fas fa-eye" style="color: gray;"></i>
                                </a> -->
                                <a href="{{ route('artefak.edit', $artefak->id_artefak) }}">
                                    <i class="nav-icon fas fa-pen" style="color: blue;"></i>
                                </a>
                                <form action="{{ route('artefak.destroy', $artefak->id_artefak) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link" style="color: red; padding: 0; border: none;">
                                        <i class="nav-icon fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </h5>
                        <div class="card-body">
                            <p class="card-text">{{ $artefak->deskripsi }}</p>
                            <p class="card-text"><small class="text-muted">{{ $artefak->formatted_tenggat_waktu }}</small></p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
