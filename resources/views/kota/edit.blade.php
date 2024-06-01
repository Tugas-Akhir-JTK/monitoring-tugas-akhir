@extends('adminlte.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 col-md-8">
                    <h1 class="m-0">Edit KoTA {{ ($kota->id_kota) }}</h1>
                </div>
            </div>
            <hr />
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <form action="{{ route('kota.update', $kota->id_kota) }}" method="post" enctype="multipart/form-data">
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
                        <!-- Nomor KoTA
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
                                    <input name="nama_kota" value="{{ old('nama_kota', $kota->nama_kota) }}" type="text"
                                        class="form-control" placeholder="Masukan Id KoTA" required />
                                </div>
                            </div>
                        </div> -->

                        <!-- Tambah Mahasiswa dan Dosen Pembimbing -->
                        <div>
                            <label for="user_ids">Select Users</label>
                            <select name="user_ids[]" id="user_ids" multiple required>
                                @foreach($users as $user)
                                    <option value="{{ $user->id_user }}" {{ in_array($user->id_user, $kota->users->pluck('id_user')->toArray()) ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
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
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
            <br />
            <br />
            <br />
        </div>
    </div>
</div>
@endsection
