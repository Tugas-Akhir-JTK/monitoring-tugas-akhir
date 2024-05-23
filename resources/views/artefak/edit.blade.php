@extends('adminlte.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 col-md-8">
                    <h1 class="m-0">Edit Artefak</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <hr />
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <form action="{{ route('artefak.update', $artefaks->id_artefak) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama_artefak">Nama Artefak</label>
                    <input type="text" class="form-control" id="nama_artefak" name="nama_artefak" value="{{ $artefaks->nama_artefak }}" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" required>{{ $artefaks->deskripsi }}</textarea>
                </div>
                <div class="form-group">
                    <label for="kategori_artefak">Kategori Artefak</label>
                    <input type="text" class="form-control" id="kategori_artefak" name="kategori_artefak" value="{{ $artefaks->kategori_artefak }}" required>
                </div>
                <div class="form-group">
                    <label for="tenggat_waktu">Tenggat Waktu</label>
                    <input type="datetime-local" class="form-control" id="tenggat_waktu" name="tenggat_waktu" value="{{ $artefaks->tenggat_waktu }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        <br />
        <br />
        <br />
    </div>
</div>
</div>
<!-- End of Main Content -->
@endsection
