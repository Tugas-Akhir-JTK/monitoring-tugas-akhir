@extends('adminlte.layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <h1 class="m-0">Daftar Kelompok Tugas Akhir</h1>
          </div>
          <div class="col d-flex justify-content-end">
            <div class="btn-group mr-2">
              <!-- Messages Dropdown Menu -->
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  Periode
                </button>
                <ul class="dropdown-menu">
                  <li><a href="{{ route('kota', ['sort' => 'periode', 'direction' => 'asc', 'value' => 2023]) }}"
                      class="dropdown-item">2023</a></li>
                  <li><a href="{{ route('kota', ['sort' => 'periode', 'direction' => 'asc', 'value' => 2024]) }}"
                      class="dropdown-item">2024</a></li>
                  <li><a href="{{ route('kota', ['sort' => 'periode', 'direction' => 'asc', 'value' => 2025]) }}"
                      class="dropdown-item">2025</a></li>
                  <li><a href="{{ route('kota', ['sort' => 'periode', 'direction' => 'asc', 'value' => 2026]) }}"
                      class="dropdown-item">2026</a></li>
                  <li><a href="{{ route('kota', ['sort' => 'periode', 'direction' => 'asc', 'value' => 2027]) }}"
                      class="dropdown-item">2027</a></li>
                  <li><a href="{{ route('kota', ['sort' => 'periode', 'direction' => 'asc', 'value' => 2028]) }}"
                      class="dropdown-item">2028</a></li>
                  <li><a href="{{ route('kota', ['sort' => 'periode', 'direction' => 'asc', 'value' => 2029]) }}"
                      class="dropdown-item">2029</a></li>
                  <li><a href="{{ route('kota', ['sort' => 'periode', 'direction' => 'asc', 'value' => 2030]) }}"
                      class="dropdown-item">2026</a></li>
                </ul>
              </div>
            </div>
            <div class="btn-group mr-2">
              <!-- Messages Dropdown Menu -->
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  Kelas
                </button>
                <ul class="dropdown-menu">
                  <li><a href="{{ route('kota', ['sort' => 'kelas', 'direction' => 'asc', 'value' => 1]) }}"
                      class="dropdown-item">D3-A</a></li>
                  <li><a href="{{ route('kota', ['sort' => 'kelas', 'direction' => 'asc', 'value' => 2]) }}"
                      class="dropdown-item">D3-B</a></li>
                  <li><a href="{{ route('kota', ['sort' => 'kelas', 'direction' => 'asc', 'value' => 3]) }}"
                      class="dropdown-item">D4-A</a></li>
                  <li><a href="{{ route('kota', ['sort' => 'kelas', 'direction' => 'asc', 'value' => 4]) }}"
                      class="dropdown-item">D4-B</a></li>
                </ul>
              </div>
            </div>
            <div class="btn-group mr-2">
              <!-- Notifications Dropdown Menu -->
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" href="#">
                  Tahapan TA
                </button>
                <ul class="dropdown-menu dropdown-menu-lg">
                  <li><a
                      href="{{ route('kota', ['sort' => 'tbl_master_tahapan_progres.nama_progres', 'direction' => 'asc', 'value' => 'Seminar 1']) }}"
                      class="dropdown-item">Seminar 1</a></li>
                  <li><a
                      href="{{ route('kota', ['sort' => 'tbl_master_tahapan_progres.nama_progres', 'direction' => 'asc', 'value' => 'Seminar 2']) }}"
                      class="dropdown-item">Seminar 2</a></li>
                  <li><a
                      href="{{ route('kota', ['sort' => 'tbl_master_tahapan_progres.nama_progres', 'direction' => 'asc', 'value' => 'Seminar 3']) }}"
                      class="dropdown-item">Seminar 3</a></li>
                  <li><a
                      href="{{ route('kota', ['sort' => 'tbl_master_tahapan_progres.nama_progres', 'direction' => 'asc', 'value' => 'Sidang']) }}"
                      class="dropdown-item">Sidang</a></li>
                </ul>
              </div>
            </div>
            <div class="btn-group">
              <a href="{{ url('/kota/create') }}">
                <button type="button" class="btn btn-success">
                  Tambah
                  <i class="nav-icon fas fa-plus"></i>
                </button>
              </a>
            </div>
          </div>
        </div><!-- /.row -->
        <hr />
      </div><!-- /.container-fluid -->
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- DataTables Example -->
          <div class="card mb-4 shadow">
            <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table-bordered data-table table" width="100%" cellspacing="0">
                  <thead class="text-center" style="background-color: gray; color: white;">
                    <tr>
                      <th>No</th>
                      <th>Kode KoTA</th>
                      <th>Judul KoTA</th>
                      <th>Tahap Progres</th>
                      <th>Metodologi</th>
                      <th>Mitra</th>
                      <th>Luaran</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $nomor = 1; ?>
                    @foreach ($kotas as $kota)
                      <tr>
                        <td class="text-center">{{ $nomor++ }}</td>
                        <td class="text-center">{{ $kota['nama_kota'] }}</td>
                        <td>{{ $kota['judul_tugas_akhir'] }}</td>
                        <td class="text-center">
                          {{ isset($kota['timeline']['nama_timeline']) ? $kota['timeline']['nama_timeline'] : '-' }}
                        </td>
                        <td class="text-center">
                          {{ $kota['metodologi_tugas_akhir'] !== null ? $kota['metodologi_tugas_akhir'] : '-' }}</td>
                        <td class="text-center">{{ $kota['mitra_tugas_akhir'] }}</td>
                        <td class="text-center">{{ $kota['luaran_tugas_akhir'] }}</td>
                        <td class="text-center">
                          <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route('kota.destroy', $kota['id']) }}" method="POST">
                            <a class="detail" href="{{ route('kota.detail', $kota['id']) }}" data-toggle="tooltip"
                              data-placement="top" title="Detail KoTA">
                              <i class="nav-icon fas fa-eye" style="color: gray;"></i>
                            </a>
                            <a class="edit" href="{{ route('kota.edit', $kota['id']) }}" data-toggle="tooltip"
                              data-placement="top" title="Edit KoTA">
                              <i class="nav-icon fas fa-pen" style="color: blue;"></i>
                            </a>
                            <a href="#" class="destroy" data-placement="top" title="Delete KoTA"
                              data-toggle="modal" data-target="#deleteKotaModal-{{ $kota['id'] }}">
                              <i class="nav-icon fas fa-trash" style="color: red;"></i>
                            </a>
                            @csrf
                            @method('DELETE')
                          </form>
                        </td>
                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteKotaModal-{{ $kota['id'] }}" tabindex="-1"
                          role="dialog" aria-labelledby="deleteKotaModalLabel-{{ $kota['id'] }}"
                          aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="deleteKotaModalLabel-{{ $kota['id'] }}">Konfirmasi Hapus
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <p>Apakah Anda yakin ingin menghapus KoTA "<strong>{{ $kota['nama_kota'] }}</strong>"?
                                </p>
                              </div>
                              <div class="modal-footer">
                                <form action="{{ route('kota.destroy', $kota['id']) }}" method="POST"
                                  style="display:inline;">
                                  @csrf
                                  @method('DELETE')
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                  <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <script>
        document.addEventListener('DOMContentLoaded', function() {
          $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
      </script>
    @endsection
