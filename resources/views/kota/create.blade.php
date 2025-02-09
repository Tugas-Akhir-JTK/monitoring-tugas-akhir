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
        <hr />
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
                    <input name="nama_kota" value="{{ old('nama_kota') }}" type="number" class="form-control"
                      placeholder="Masukan Nomor KoTA" required />
                  </div>
                </div>
              </div>

              <!-- Tambah Mahasiswa dan Dosen Pembimbing -->
              <div class="row">
                <div class="col-md-4">
                  <div class="list-group-item p-3">
                    <div class="row align-items-start">
                      <div class="col-md-4 mb-8pt mb-md-0">
                        <div class="media align-items-left">
                          <div class="d-flex flex-column media-body media-middle">
                            <span class="card-title" for="mahasiswa">Mahasiswa 1</span>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <select class="form-control" id="mahasiswa" name="mahasiswa1" required>
                          <option value="" disabled selected>Pilih Mahasiswa</option>
                          @foreach ($mahasiswas as $mahasiswa)
                            <option value="{{ $mahasiswa->nomor_induk }}"
                              {{ in_array($mahasiswa->nomor_induk, old('mahasiswa', [])) ? 'selected' : '' }}>
                              {{ $mahasiswa->nomor_induk }} - {{ $mahasiswa->nama }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="list-group-item p-3">
                    <div class="row align-items-start">
                      <div class="col-md-4 mb-8pt mb-md-0">
                        <div class="media align-items-left">
                          <div class="d-flex flex-column media-body media-middle">
                            <span class="card-title" for="mahasiswa">Mahasiswa 2</span>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <select class="form-control" id="mahasiswa" name="mahasiswa2">
                          <option value="" disabled selected>Pilih Mahasiswa</option>
                          @foreach ($mahasiswas as $mahasiswa)
                            <option value="{{ $mahasiswa->nomor_induk }}"
                              {{ in_array($mahasiswa->nomor_induk, old('mahasiswa', [])) ? 'selected' : '' }}>
                              {{ $mahasiswa->nomor_induk }} - {{ $mahasiswa->nama }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="list-group-item p-3">
                    <div class="row align-items-start">
                      <div class="col-md-4 mb-8pt mb-md-0">
                        <div class="media align-items-left">
                          <div class="d-flex flex-column media-body media-middle">
                            <span class="card-title" for="mahasiswa">Mahasiswa 3</span>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <select class="form-control" id="mahasiswa" name="mahasiswa3">
                          <option value="" disabled selected>Pilih Mahasiswa</option>
                          @foreach ($mahasiswas as $mahasiswa)
                            <option value="{{ $mahasiswa->nomor_induk }}"
                              {{ in_array($mahasiswa->nomor_induk, old('mahasiswa', [])) ? 'selected' : '' }}>
                              {{ $mahasiswa->nomor_induk }} - {{ $mahasiswa->nama }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- JUDUL TUGAS AKHIR -->
              <div class="list-group-item p-3">
                <div class="row align-items-start">
                  <div class="col-md-2 mb-8pt mb-md-0">
                    <div class="media align-items-left">
                      <div class="d-flex flex-column media-body media-middle">
                        <span class="card-title">Judul Tugas Akhir</span>
                      </div>
                    </div>
                  </div>
                  <div class="col mb-8pt mb-md-0">
                    <input name="judul_tugas_akhir" value="{{ old('judul_tugas_akhir') }}" type="text"
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
                    <select class="form-control" id="periode" name="periode_id" required>
                      <option value="" disabled selected>Pilih Periode</option>
                      @foreach ($periodes as $periode)
                        <option value="{{ $periode->id }}"
                          {{ in_array($periode->id, old('periodes', [])) ? 'selected' : '' }}>
                          {{ $periode->periode }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>

              <!-- KELAS -->
              <div class="list-group-item p-3">
                <div class="row align-items-start">
                  <div class="col-md-2 mb-8pt mb-md-0">
                    <div class="media align-items-left">
                      <div class="d-flex flex-column media-body media-middle">
                        <span class="card-title" for="kelas">Kelas</span>
                      </div>
                    </div>
                  </div>
                  <div class="col mb-8pt mb-md-0">
                    <select name="kelas" class="form-control" id="kelas" required>
                      <option value="" disabled selected>Pilih Kelas</option>
                      <option value="1" {{ old('kelas') == 1 ? 'selected' : '' }}>D3-A</option>
                      <option value="2" {{ old('kelas') == 2 ? 'selected' : '' }}>D3-B</option>
                      <option value="3" {{ old('kelas') == 3 ? 'selected' : '' }}>D4-A</option>
                      <option value="4" {{ old('kelas') == 4 ? 'selected' : '' }}>D4-B</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="list-group-item p-3">
                <div class="row align-items-start">
                  <div class="col-md-2 mb-8pt mb-md-0">
                    <div class="media align-items-left">
                      <div class="d-flex flex-column media-body media-middle">
                        <span class="card-title" for="mitra">Mitra</span>
                      </div>
                    </div>
                  </div>
                  <div class="col mb-8pt mb-md-0">
                    <select name="mitra_tugas_akhir" class="form-control" id="mitra" required>
                      <option value="" disabled selected>Pilih Mitra</option>
                      <option value="Non-mitra" {{ old('mitra') == 'Non-mitra' ? 'selected' : '' }}>Non-mitra</option>
                      <option value="Organisasi" {{ old('mitra') == 'Organisasi' ? 'selected' : '' }}>Organisasi
                      </option>
                      <option value="Industri" {{ old('mitra') == 'Industri' ? 'selected' : '' }}>Industri</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="list-group-item p-3">
                <div class="row align-items-start">
                  <div class="col-md-2 mb-8pt mb-md-0">
                    <div class="media align-items-left">
                      <div class="d-flex flex-column media-body media-middle">
                        <span class="card-title" for="luaran">Luaran</span>
                      </div>
                    </div>
                  </div>
                  <div class="col mb-8pt mb-md-0">
                    <select name="luaran_tugas_akhir" class="form-control" id="luaran" required>
                      <option value="" disabled selected>Pilih Luaran</option>
                      <option value="HKI" {{ old('luaran') == 'HKI' ? 'selected' : '' }}>HKI</option>
                      <option value="UAT" {{ old('luaran') == 'UAT' ? 'selected' : '' }}>UAT</option>
                      <option value="Jurnal" {{ old('luaran') == 'Jurnal' ? 'selected' : '' }}>Jurnal</option>
                    </select>
                  </div>
                </div>
              </div>


              <!-- TAHAPAN PROGRES -->
              <!-- <div class="list-group-item p-3">
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
                                                                          </div> -->

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
      <br />
      <br />
      <br />
    </div>
  </div>
  </div>
  <!-- End of Main Content -->
@endsection
