@extends('adminlte.layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 col-md-8">
                    <h1 class="m-0">Detail Resume Bimbingan</h1>
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
                    <div class="card">
                        <div class="card-body">
                            @if(session('success'))
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                    <div>
                                        Kota Berhasil Diubah
                                    </div>
                            </div> 
                            @elseif(session('successdelete'))
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                    <div>
                                        Kota Berhasil Didelete
                                    </div>
                            </div>

                            <div>
                                <h5>Resume Bimbingan</h5>
                                <small>{{ $resumes->isi_resume_bimbingan }}</small>
                            </div>
                            <br>
                            <div>
                                <h5>Revisi</h5>
                                <small>{{ $resumes->isi_resume_bimbingan }}</small>
                            </div>
                            <br>
                            <div class="row g-2">
                                <!-- PROGRES PENGERJAAN -->
                                <div class="col mb-3">
                                    <label for="progres_pengerjaan" class="form-label">Progres Pengerjaan</label>
                                    <input class="form-control" value="{{ $resumes->progres_pengerjaan }}%" readonly/> 
                                </div>

                                <!-- TAHAPAN PROGRES -->
                                <div class="col mb-3">
                                    <label>Tahapan Progres</label>
                                    <input class="form-control" value="{{ $tahapan_progres }}" readonly/> 
                                </div>
                            </div>
                        </div>
                    </div>
                <br/>
                <br/>
                <br/>
            </div>
        </div>

    </div>
<!-- End of Main Content -->
@endsection
