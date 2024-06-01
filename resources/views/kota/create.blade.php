@extends('adminlte.layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6 col-md-8">
                  <h1 class="m-0">Tambah KoTA</h1>
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
        <form action="{{ url('/kota/store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row card-group-row">
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
            <div class="col-md-12">
                    
                    <!-- Nomor KoTA -->
                    <div class="list-group-item p-3">
                        <div class="row align-items-start">
                            <div class="col-md-2 mb-8pt mb-md-0">
                                <div class="media align-items-left">
                                    <div class="d-flex flex-column media-body media-middle">
                                        <span class="card-title">Nomor KoTA</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-8pt mb-md-0">
                                <input name="nama_kota" value="{{ old('nama_kota') }}" type="text" class="form-control" placeholder="Masukan Id KoTA" required/>
                            </div>
                        </div>
                    </div>

                    <!-- Tambah Mahasiswa dan Dosen Pembimbing -->
                    <div>
                        <label for="user_ids">Select Users</label>
                        <select name="user_ids[]" id="user_ids" multiple required>
                            @foreach($users as $user)
                                <option value="{{ $user->id_user }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- JUDUL KUTIPAN -->
                    <div class="list-group-item p-3">
                        <div class="row align-items-start">
                            <div class="col-md-2 mb-8pt mb-md-0">
                                <div class="media align-items-left">
                                    <div class="d-flex flex-column media-body media-middle">
                                        <span class="card-title">Judul</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-8pt mb-md-0">
                                <input name="judul" value="{{ old('judul') }}" type="text" class="form-control" placeholder="Masukan Judul" required/>
                            </div>
                        </div>
                    </div>

                    <!-- Periode -->
                    <div class="list-group-item p-3">
                        <div class="row align-items-start">
                            <div class="col-md-2 mb-8pt mb-md-0">
                                <div class="media align-items-left">
                                    <div class="d-flex flex-column media-body media-middle">
                                        <span class="card-title">Periode</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-8pt mb-md-0">
                                <input name="periode" value="{{ old('periode') }}" type="text" class="form-control" placeholder="Masukan Periode" required/>
                            </div>
                        </div>
                    </div>

                    <!-- KELAS -->
                    <div class="list-group-item p-3">
                        <div class="row align-items-start">
                            <div class="col-md-2 mb-8pt mb-md-0">
                                <div class="media align-items-left">
                                    <div class="d-flex flex-column media-body media-middle">
                                        <span class="card-title">Kelas</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-8pt mb-md-0">
                                <input name="kelas" value="{{ old('kelas') }}" type="text" class="form-control" placeholder="Masukan Kelas" required/>
                            </div>
                        </div>
                    </div>

                    <!-- TAHAPAN PROGRES -->
                    <div class="list-group-item p-3">
                        <div class="row align-items-start">
                            <div class="col-md-2 mb-8pt mb-md-0">
                                <div class="media align-items-left">
                                    <div class="d-flex flex-column media-body media-middle">
                                        <span class="card-title">Tahapan Progres</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-8pt mb-md-0">
                                <input name="tahapan_progres" value="{{ old('tahapan_progres') }}" type="text" class="form-control" placeholder="Masukan Tahapan Progres" required/>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <br>
              <div class="row">
                <div class="col-auto me-auto">
                </div>
                <div class="col-auto" style="margin-left: auto;">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
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
