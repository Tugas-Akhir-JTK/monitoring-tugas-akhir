@extends('adminlte.layouts.app')

@section('content')
  <div class="content-wrapper">
    <div class="content-header pb-0">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Timeline</h1>
          </div>
          <div class="col d-grid d-md-flex justify-content-md-end gap-2">
            @if (auth()->user()->role == '1')
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addTimelineModal">
                Tambah
                <i class="nav-icon fas fa-plus"></i>
              </button>

              <!-- Tambah Timeline Modal -->
              <div class="modal fade" id="addTimelineModal" tabindex="-1" role="dialog"
                aria-labelledby="addTimelineModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="addTimelineModalLabel">Tambah Timeline</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="{{ route('timeline.store') }}" method="POST">
                      @csrf
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="nama_timeline">Nama Kegiatan</label>
                          <input type="text" class="form-control" id="nama_timeline" name="nama_timeline"
                            placeholder="Nama Timeline" required>
                        </div>
                        <div class="form-group">
                          <label for="deskripsi_timeline">Deskripsi</label>
                          <textarea class="form-control" id="deskripsi_timeline" name="deskripsi_timeline" rows="3"
                            placeholder="Deskripsi Timeline" required></textarea>
                        </div>
                        <div class="form-group">
                          <label for="tanggal_mulai">Tanggal Mulai</label>
                          <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                        </div>
                        <div class="form-group">
                          <label for="tanggal_selesai">Tanggal Selesai</label>
                          <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" required>
                        </div>
                        <label>Pilih Artefak</label>
                        <div class="container border" style="height: 120px; overflow-y: auto; border-color:#007bff">
                          @foreach ($artefaks as $artefak)
                            <input type="checkbox" id="{{ $artefak['id'] }}" name="artefak_id_selected[]"
                              value="{{ $artefak['id'] }}">
                            <label for="{{ $artefak['id'] }}">{{ $artefak['nama_artefak'] }}</label><br>
                          @endforeach
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            @endif
          </div>
        </div>
        <hr>
      </div>
    </div>

    <!-- Main content -->
    <div class="content mx-3 px-4 py-3" style="background-color: #B8C6E2;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="timeline timeline-inverse">
              @foreach ($timelines as $timeline)
                <div class="time-label">
                  <span class="bg-secondary">{{ $timeline['tanggal_mulai'] }}</span>
                </div>

                <!-- timeline-item -->
                <div class="">
                  <i class="fas fa-calendar bg-blue"></i>
                  <div class="timeline-item">
                    <div class="timeline-header d-flex justify-content-between align-items-center">
                      <strong>{{ $timeline['nama_timeline'] }}</strong>
                      @if (auth()->user()->role == '1')
                        <div class="mr-2">
                          <!-- Edit Button trigger modal -->
                          <a href="#" data-toggle="modal" data-toggle="tooltip" data-placement="top"
                            title="Edit Timeline" data-target="#editTimelineModal-{{ $timeline['id'] }}">
                            <i class="nav-icon fas fa-pen" style="color: blue;"></i>
                          </a>
                          <!-- Delete Button trigger modal -->
                          <a href="#" data-toggle="modal" data-placement="top" title="Delete Timeline"
                            data-target="#deleteTimelineModal-{{ $timeline['id'] }}">
                            <i class="nav-icon fas fa-trash" style="color: red;"></i>
                          </a>

                          <!-- Edit Modal -->
                          <div class="modal fade" id="editTimelineModal-{{ $timeline['id'] }}" tabindex="-1"
                            role="dialog" aria-labelledby="editTimelineModalLabel-{{ $timeline['id'] }}"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="editTimelineModalLabel-{{ $timeline['id'] }}">
                                    Edit Timeline</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <form action="{{ route('timeline.update', $timeline['id']) }}" method="POST">
                                  @csrf
                                  @method('PUT')
                                  <div class="modal-body">
                                    <div class="form-group">
                                      <label for="edit_nama_kegiatan_{{ $timeline['id'] }}">Nama
                                        Kegiatan</label>
                                      <input type="text" class="form-control"
                                        id="edit_nama_kegiatan_{{ $timeline['id'] }}" name="nama_timeline"
                                        value="{{ $timeline['nama_timeline'] }}" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="edit_deskripsi_{{ $timeline['id'] }}">Deskripsi</label>
                                      <textarea class="form-control" id="edit_deskripsi_{{ $timeline['id'] }}" name="deskripsi_timeline" rows="3">{{ $timeline['deskripsi_timeline'] }}</textarea>
                                    </div>
                                    <div class="form-group">
                                      <label for="edit_tanggal_mulai_{{ $timeline['id'] }}">Tanggal
                                        Mulai</label>
                                      <input type="date" class="form-control"
                                        id="edit_tanggal_mulai_{{ $timeline['id'] }}" name="tanggal_mulai"
                                        value="{{ $timeline['tanggal_mulai'] }}" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="edit_tanggal_selesai_{{ $timeline['id'] }}">Tanggal
                                        Selesai</label>
                                      <input type="date" class="form-control"
                                        id="edit_tanggal_selesai_{{ $timeline['id'] }}" name="tanggal_selesai"
                                        value="{{ $timeline['tanggal_selesai'] }}" required>
                                    </div>
                                    <label>Pilih Artefak</label>
                                    <div class="container border"
                                      style="height: 120px; overflow-y: auto; border-color:#007bff">
                                      @foreach ($artefaks as $artefak)
                                        <input type="checkbox" id="{{ $artefak['id'] }}" name="artefak_id_selected[]"
                                          value="{{ $artefak['id'] }}"
                                          {{ $artefak['timeline_utama_id'] == $timeline['id'] ? 'checked' : '' }}>
                                        <label for="{{ $artefak['id'] }}">{{ $artefak['nama_artefak'] }}</label><br>
                                      @endforeach
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                      data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>

                          <!-- Delete Modal -->
                          <div class="modal fade" id="deleteTimelineModal-{{ $timeline['id'] }}" tabindex="-1"
                            role="dialog" aria-labelledby="deleteTimelineModalLabel-{{ $timeline['id'] }}"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="deleteTimelineModalLabel-{{ $timeline['id'] }}">
                                    Konfirmasi Hapus</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p>Apakah Anda yakin ingin menghapus timeline dengan kegiatan
                                    "<strong>{{ $timeline['nama_timeline'] }}</strong>"?</p>
                                </div>
                                <div class="modal-footer">
                                  <form action="{{ route('timeline.destroy', $timeline['id']) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-secondary"
                                      data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      @endif
                    </div>
                    <div class="timeline-body">
                      <div>
                        {{ $timeline['deskripsi_timeline'] }}
                      </div>
                      @if (isset($timeline['artefaks']))
                        @foreach ($timeline['artefaks'] as $artefak)
                          <button class="badge badge-secondary btn">
                            {{ $artefak['nama_artefak'] }}
                          </button>
                        @endforeach
                      @else
                        Tidak ada artefak terkait.
                      @endif
                    </div>
                  </div>
                  <!-- /.timeline-item -->
                </div>
              @endforeach
              <div>
                <i class="fas fa-clock bg-gray"></i>
              </div>
            </div> <!-- /.timeline -->
          </div>
        </div> <!-- /.row -->
      </div> <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <br>
    <br>
    <br>
  </div>
  <!-- /.content-wrapper -->
@endsection
