@extends('adminlte.layouts.app')

@section('content')
    <!-- Pembungkus Konten. Berisi konten halaman -->
    <div class="content-wrapper">
        <!-- Header Konten (Judul halaman) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col">
                        <h1 class="m-0">Jadwal Kegiatan</h1>
                    </div>
                    <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
                        <!-- Tombol untuk membuka modal -->
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addKegiatanModal">Tambah Kegiatan</button>
                    </div>  
                </div><!-- /.row -->
                <hr/>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.header konten -->

        <!-- Konten Utama -->
        <div class="content">
            <!-- Memulai Konten Halaman -->
            <div class="container-fluid">
                <!-- Contoh DataTables -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead class="text-center" style="background-color: gray; color: white;">
                                    <tr>
                                        <th rowspan="2">Kegiatan</th>
                                        <th colspan="4">Februari</th>
                                        <th colspan="4">Maret</th>
                                        <th colspan="4">April</th>
                                        <th colspan="4">Mei</th>
                                        <th colspan="4">Juni</th>
                                        <th rowspan="2">Aksi</th>
                                    </tr>
                                    <tr>
                                        <th>M1</th>
                                        <th>M2</th>
                                        <th>M3</th>
                                        <th>M4</th>
                                        <th>M1</th>
                                        <th>M2</th>
                                        <th>M3</th>
                                        <th>M4</th>
                                        <th>M1</th>
                                        <th>M2</th>
                                        <th>M3</th>
                                        <th>M4</th>
                                        <th>M1</th>
                                        <th>M2</th>
                                        <th>M3</th>
                                        <th>M4</th>
                                        <th>M1</th>
                                        <th>M2</th>
                                        <th>M3</th>
                                        <th>M4</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($jadwalKegiatan as $kegiatan)
                                        <tr>
                                            <td>{!! $kegiatan->jenis_label == 'Proses' ? '<strong>' . $kegiatan->nama_kegiatan . '</strong>' : $kegiatan->nama_kegiatan !!}</td>
                                            @for($i = 1; $i <= 5; $i++)
                                                @for($j = 1; $j <= 4; $j++)
                                                    <td style="background-color: {{ ($kegiatan->bulan == $i && $kegiatan->minggu == $j) ? ($kegiatan->status == 'selesai' ? 'blue' : 'green') : 'transparent' }};"></td>
                                                @endfor
                                            @endfor
                                            <td>
                                                <a href="#" class="edit-kegiatan" data-bs-toggle="modal" data-bs-target="#editKegiatanModal{{ $kegiatan->id }}">
                                                    <i class="nav-icon fas fa-pen" style="color: blue;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk menambah kegiatan -->
    <div class="modal fade" id="addKegiatanModal" tabindex="-1" aria-labelledby="addKegiatanModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addKegiatanModalLabel">Tambah Kegiatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('kegiatan.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="jenis_label" class="form-label">Jenis Label</label>
                            <select class="form-control" id="jenis_label" name="jenis_label" required>
                                <option value="Proses">Proses</option>
                                <option value="Tahapan">Tahapan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" required>
                        </div>
                        <div class="mb-3">
                            <label for="bulan" class="form-label">Bulan</label>
                            <select class="form-control" id="bulan" name="bulan" required>
                                <option value="1">Februari</option>
                                <option value="2">Maret</option>
                                <option value="3">April</option>
                                <option value="4">Mei</option>
                                <option value="5">Juni</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="minggu" class="form-label">Minggu</label>
                            <select class="form-control" id="minggu" name="minggu" required>
                                <option value="1">Minggu 1</option>
                                <option value="2">Minggu 2</option>
                                <option value="3">Minggu 3</option>
                                <option value="4">Minggu 4</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="selesai">Selesai</option>
                                <option value="belum_selesai">Belum Selesai</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- Button edit
<a href="#" class="edit-kegiatan" data-bs-toggle="modal" data-bs-target="#editKegiatanModal{{ $kegiatan->id }}">
    <i class="nav-icon fas fa-pen" style="color: blue;"></i>
</a> -->
<!-- Modal Edit kegiatan -->
@foreach($jadwalKegiatan as $kegiatan)
<div class="modal fade" id="editKegiatanModal{{  $kegiatan->id }}" tabindex="-1" aria-labelledby="editKegiatanModalLabel{{  $kegiatan->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('kegiatan.update',  $kegiatan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editKegiatanModalLabel{{ $kegiatan->id }}">Edit Kegiatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="editStatus" name="status" value="{{ old('status', $kegiatan->status) }}" required>
                            <option value="selesai">Selesai</option>
                            <option value="belum_selesai">Belum Selesai</option>
                        </select>
                    </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection
