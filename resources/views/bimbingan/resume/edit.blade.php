@extends('adminlte.layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 col-md-8">
                    <h1 class="m-0">Tambah Resume Bimbingan</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <hr/>
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <form action="{{ route('resume.update', $resume->id_resume_bimbingan) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-body">
                            @if (isset($errors) && $errors->any())
                                <div class="col-md-12">
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-warning" role="alert">
                                            <i class="mdi mdi-alert-outline me-2"></i>
                                            {{ $error }}
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            <!-- DOSEN -->
                            <div class="mb-3">
                                <label for="judul" class="form-label">Dosen</label>
                                <input name="judul" value="{{ old('judul') }}" type="text" class="form-control" id="judul" placeholder="" required disabled/>
                            </div>

                            <div class="row g-2">
                                <!-- TANGGAL BIMBINGAN -->
                                <div class="col mb-3">
                                    <label for="tanggal_bimbingan" class="form-label">Tanggal</label>
                                    <input name="tanggal_bimbingan" value="{{ old('tanggal_bimbingan', $resume->tanggal_bimbingan) }}" type="date" class="form-control" id="tanggal_bimbingan" placeholder="dd/mm/yy" required/>
                                </div>

                                <!-- WAKTU BIMBINGAN -->
                                <div class="col mb-3">
                                    <label for="waktu_bimbingan" class="form-label">Waktu Bimbingan</label>
                                    <input name="waktu_bimbingan" value="{{ old('waktu_bimbingan', $resume->waktu_bimbingan) }}" type="time" class="form-control" id="waktu_bimbingan" placeholder="hh:mm" required/>
                                </div>
                            </div>

                            <!-- ISI RESUME BIMBINGAN -->
                            <div class="mb-3">
                                <label for="isi_resume_bimbingan" class="form-label">Resume Bimbingan</label>
                                <textarea name="isi_resume_bimbingan" class="form-control" id="isi_resume_bimbingan" rows="3" required>{{ old('isi_resume_bimbingan', $resume->isi_resume_bimbingan) }}</textarea>
                            </div>

                            <div class="row g-2">
                                <!-- PROGRES PENGERJAAN -->
                                <div class="col mb-3">
                                    <label for="progres_pengerjaan" class="form-label">Progres Pengerjaan</label>
                                    <input name="progres_pengerjaan" value="{{ old('progres_pengerjaan', $resume->progres_pengerjaan) }}" type="text" class="form-control" id="progres_pengerjaan" placeholder="%" required/>
                                </div>

                                <!-- TAHAPAN PROGRES -->
                                <div class="col mb-3">
                                    <label for="tahapan_progres" class="form-label">Tahapan Progres</label>
                                    <select name="tahapan_progres" class="form-select" id="tahapan_progres" value="{{ old('progres_pengerjaan', $resume->progres_pengerjaan) }}" required>
                                        <option value="" disabled selected>{{ $tahapan_progres }}</option>
                                        <option value="1" {{ old('tahapan_progres', $resume->tahapan_progres) == 1 ? 'selected' : '' }}>Seminar 2</option>
                                        <option value="2" {{ old('tahapan_progres', $resume->tahapan_progres) == 2 ? 'selected' : '' }}>Seminar 3</option>
                                        <option value="3" {{ old('tahapan_progres', $resume->tahapan_progres) == 3 ? 'selected' : '' }}>Sidang</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-auto me-auto"></div>
                        <div class="col-auto" style="margin-left: auto;">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
                <br/>
                <br/>
                <br/>
            </div>
        </div>

    </div>
<!-- End of Main Content -->
@endsection
