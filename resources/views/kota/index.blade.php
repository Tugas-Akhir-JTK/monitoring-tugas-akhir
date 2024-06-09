@extends('adminlte.layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col">
                        <h1 class="m-0">Daftar Kelompok Tugas Akhir</h1>
                    </div>
                    <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
                        <!-- Messages Dropdown Menu -->
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                             Kelas
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('kota', ['sort' => 'kelas', 'direction' => 'asc', 'value' => 1]) }}" class="dropdown-item">D3-A</a></li>
                                <li><a href="{{ route('kota', ['sort' => 'kelas', 'direction' => 'asc', 'value' => 2]) }}" class="dropdown-item">D3-B</a></li>
                                <li><a href="{{ route('kota', ['sort' => 'kelas', 'direction' => 'asc', 'value' => 3]) }}" class="dropdown-item">D4-A</a></li>
                                <li><a href="{{ route('kota', ['sort' => 'kelas', 'direction' => 'asc', 'value' => 4]) }}" class="dropdown-item">D4-B</a></li>
                            </ul>
                        </div>

                        <!-- Notifications Dropdown Menu -->
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" href="#">
                                Tahapan TA
                            </button>
                            <ul class="dropdown-menu dropdown-menu-lg">
                                <li><a href="#" class="dropdown-item">Seminar 1</a></li>
                                <li><a href="#" class="dropdown-item">Seminar 2</a></li>
                                <li><a href="#" class="dropdown-item">Seminar 3</a></li>
                                <li><a href="#" class="dropdown-item">Sidang</a></li>
                            </ul>
                        </div>
                        <a href="{{ url('/kota/create') }} ">
                            <button type="button" class="btn btn-success">
                                Tambah
                                <i class="nav-icon fas fa-plus"></i>
                            </button>
                        </a>
                    </div>
                    
                </div><!-- /.row -->
            <hr/>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">
    <!-- <div class="toast align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Hello, world! This is a toast message.
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>    -->

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
                <form class="me-m d-2" action="{{ route('kota.search') }}" method="GET">
                    <input type="text" name="keyword" placeholder="Cari Kota...">
                    <button class="btn btn-secondary" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <br>
            <div class="table-responsive">
                <table id="example" class="table table-bordered data-table"  width="100%" cellspacing="0">
                    <thead class="text-center" style="background-color: gray; color: white;">
                        <tr>
                            <th>No</th>
                            <th>Kode KoTA</th>
                            <th>Judul KoTA</th>
                            <!-- <th>Tahap Progres</th> -->
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $nomor = 1; 
                            foreach($kotas as $row):
                        ?>
                            <tr>
                                <td class="text-center"><?= $nomor++; ?></td>
                                <td class="text-center"><?= $row->nama_kota; ?></td>
                                <td><?= $row->judul;?></td>
                                <!-- <td class="text-center">
                                    <?php if($row->tahapan_progres == 1): ?>
                                        Seminar 1
                                    <?php elseif($row->tahapan_progres == 2): ?>
                                        Seminar 2
                                    <?php elseif($row->tahapan_progres == 3): ?>
                                        Seminar 3
                                    <?php elseif($row->tahapan_progres == 4): ?>
                                        Sidang
                                    <?php else: ?>
                                        Tidak Valid
                                    <?php endif; ?>
                                </td> -->
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kota.destroy', $row->id_kota) }}" method="POST">
                                        <a class="detail" href="{{ route('kota.detail', $row->id_kota) }}"><i class="nav-icon fas fa-eye" style="color: gray;"></i></a>
                                        <a class="edit" href="{{ route('kota.edit', $row->id_kota) }}"><i class="nav-icon fas fa-pen" style="color: blue;"></i></a>                     
                                        <a class="destroy" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $row->id_kota }}" data-nama="{{ $row->nama_kota }}">
                                            <i class="nav-icon fas fa-trash" style="color: red;"></i>
                                        </a>
                                    </form>
                                </td>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form id="deleteForm" action="" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">Yakin Akan Menghapus KoTA?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p id="modalBodyText"></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                                    <button type="submit" class="btn btn-danger">Iya</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        <?php endforeach; ?>
                        
                    </tbody>
                </table>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    {{ $kotas->links() }}
                </ul>
            </nav>
        </div>
    </div>
  </div>

<!-- Modal Delete by id -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Button that triggered the modal
            var id = button.getAttribute('data-id');
            var nama = button.getAttribute('data-nama');

            var modalTitle = deleteModal.querySelector('.modal-title');
            var modalBodyText = deleteModal.querySelector('#modalBodyText');
            var deleteForm = deleteModal.querySelector('#deleteForm');

            modalTitle.textContent = 'Menghapus KoTA ' + nama;
            modalBodyText.textContent = 'Apakah anda yakin ingin menghapus KoTA ' + nama + '?';
            deleteForm.action = '/kota/' + id;
        });
    });

    $(document).ready(function() {
        $('#example').DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
    });

</script>

@endsection
