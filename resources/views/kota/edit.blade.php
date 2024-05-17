@extends('adminlte.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 col-md-8">
                    <h1 class="m-0">Edit KoTA</h1>
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
            <form action="{{ route('kota.update', $kota->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row card-group-row">
                    @if($errors->any())
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
                                    <input name="id_kota" value="{{ old('id_kota', $kota->id_kota) }}" type="text"
                                        class="form-control" placeholder="Masukan Id KoTA" required />
                                </div>
                            </div>
                        </div>

                        <!-- Nomor NIM Satu -->
                        <div class="list-group-item p-3">
                            <div class="row align-items-start">
                                <div class="col-md-2 mb-8pt mb-md-0">
                                    <div class="media align-items-left">
                                        <div class="d-flex flex-column media-body media-middle">
                                            <span class="card-title">NIM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-8pt mb-md-0">
                                    <input name="nim_satu" value="{{ old('nim_satu', $kota->nim_satu) }}" type="text"
                                        class="form-control" placeholder="NIM" required />
                                </div>
                            </div>
                        </div>

                        <!-- Nomor Anggota Satu -->
                        <div class="list-group-item p-3">
                            <div class="row align-items-start">
                                <div class="col-md-2 mb-8pt mb-md-0">
                                    <div class="media align-items-left">
                                        <div class="d-flex flex-column media-body media-middle">
                                            <span class="card-title">Anggota 1</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-8pt mb-md-0">
                                    <input name="nama_mahasiswa_satu"
                                        value="{{ old('nama_mahasiswa_satu', $kota->nama_mahasiswa_satu) }}" type="text"
                                        class="form-control" placeholder="Nama Anggota 1" required />
                                </div>
                            </div>
                        </div>

                        <!-- Nomor NIM Dua -->
                        <div class="list-group-item p-3">
                            <div class="row align-items-start">
                                <div class="col-md-2 mb-8pt mb-md-0">
                                    <div class="media align-items-left">
                                        <div class="d-flex flex-column media-body media-middle">
                                            <span class="card-title">NIM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-8pt mb-md-0">
                                    <input name="nim_dua" value="{{ old('nim_dua', $kota->nim_dua) }}" type="text"
                                        class="form-control" placeholder="NIM" required />
                                </div>
                            </div>
                        </div>

                        <!-- Nomor Anggota Dua -->
                        <div class="list-group-item p-3">
                            <div class="row align-items-start">
                                <div class="col-md-2 mb-8pt mb-md-0">
                                    <div class="media align-items-left">
                                        <div class="d-flex flex-column media-body media-middle">
                                            <span class="card-title">Anggota 2</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-8pt mb-md-0">
                                    <input name="nama_mahasiswa_dua"
                                        value="{{ old('nama_mahasiswa_dua', $kota->nama_mahasiswa_dua) }}" type="text"
                                        class="form-control" placeholder="Nama Anggota 2" required />
                                </div>
                            </div>
                        </div>

                        <!-- Nomor NIM Tiga -->
                        <div class="list-group-item p-3">
                            <div class="row align-items-start">
                                <div class="col-md-2 mb-8pt mb-md-0">
                                    <div class="media align-items-left">
                                        <div class="d-flex flex-column media-body media-middle">
                                            <span class="card-title">NIM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-8pt mb-md-0">
                                    <input name="nim_tiga" value="{{ old('nim_tiga', $kota->nim_tiga) }}" type="text"
                                        class="form-control" placeholder="NIM" required />
                                </div>
                            </div>
                        </div>

                        <!-- Nomor Anggota Tiga -->
                        <div class="list-group-item p-3">
                            <div class="row align-items-start">
                                <div class="col-md-2 mb-8pt mb-md-0">
                                    <div class="media align-items-left">
                                        <div class="d-flex flex-column media-body media-middle">
                                            <span class="card-title">Anggota 3</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-8pt mb-md-0">
                                    <input name="nama_mahasiswa_tiga"
                                        value="{{ old('nama_mahasiswa_tiga', $kota->nama_mahasiswa_tiga) }}" type="text"
                                        class="form-control" placeholder="Nama Anggota 3" required />
                                </div>
                            </div>
                        </div>

                        <!-- Judul KoTA -->
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
                                    <input name="judul" value="{{ old('judul', $kota->judul) }}" type="text"
                                        class="form-control" placeholder="Masukan Judul" required />
                                </div>
                            </div>
                        </div>

                        <!-- Nomor NIP Satu -->
                        <div class="list-group-item p-3">
                            <div class="row align-items-start">
                                <div class="col-md-2 mb-8pt mb-md-0">
                                    <div class="media align-items-left">
                                        <div class="d-flex flex-column media-body media-middle">
                                            <span class="card-title">NIP</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-8pt mb-md-0">
                                    <input name="nip_satu" value="{{ old('nip_satu', $kota->nip_satu) }}" type="text"
                                        class="form-control" placeholder="NIP" required />
                                </div>
                            </div>
                        </div>

                        <!-- Nama Pembimbing Satu -->
                        <div class="list-group-item p-3">
                            <div class="row align-items-start">
                                <div class="col-md-2 mb-8pt mb-md-0">
                                    <div class="media align-items-left">
                                        <div class="d-flex flex-column media-body media-middle">
                                            <span class="card-title">Pembimbing 1</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-8pt mb-md-0">
                                    <input name="pembimbing_satu"
                                        value="{{ old('pembimbing_satu', $kota->pembimbing_satu) }}" type="text"
                                        class="form-control" placeholder="Nama Pembimbing 1" required />
                                </div>
                            </div>
                        </div>

                        <!-- Nomor NIP Dua -->
                        <div class="list-group-item p-3">
                            <div class="row align-items-start">
                                <div class="col-md-2 mb-8pt mb-md-0">
                                    <div class="media align-items-left">
                                        <div class="d-flex flex-column media-body media-middle">
                                            <span class="card-title">NIP</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-8pt mb-md-0">
                                    <input name="nip_dua" value="{{ old('nip_dua', $kota->nip_dua) }}" type="text"
                                        class="form-control" placeholder="NIP" required />
                                </div>
                            </div>
                        </div>

                        <!-- Nama Pembimbing Dua -->
                        <div class="list-group-item p-3">
                            <div class="row align-items-start">
                                <div class="col-md-2 mb-8pt mb-md-0">
                                    <div class="media align-items-left">
                                        <div class="d-flex flex-column media-body media-middle">
                                            <span class="card-title">Pembimbing 2</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-8pt mb-md-0">
                                    <input name="pembimbing_dua"
                                        value="{{ old('pembimbing_dua', $kota->pembimbing_dua) }}" type="text"
                                        class="form-control" placeholder="Nama Pembimbing 2" required />
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
                                    <input name="periode" value="{{ old('periode', $kota->periode) }}" type="text"
                                        class="form-control" placeholder="Masukan Periode" required />
                                </div>
                            </div>
                        </div>

                        <!-- Kelas -->
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
                                    <input name="kelas" value="{{ old('kelas', $kota->kelas) }}" type="text"
                                        class="form-control" placeholder="Masukan Kelas" required />
                                </div>
                            </div>
                        </div>

                        <!-- Tahapan Progres -->
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
                                    <input name="tahapan_progres"
                                        value="{{ old('tahapan_progres', $kota->tahapan_progres) }}" type="text"
                                        class="form-control" placeholder="Masukan Tahapan Progres" required />
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
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
        <br />
        <br />
        <br />
    </div>
</div>
</div>
<!-- End of Main Content -->
@endsection
