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
                        <form class="me-m   d-2" action="{{ route('kota.search') }}" method="GET">
                            <input type="text" name="keyword" placeholder="Cari Kota...">
                            <button class="btn btn-secondary" type="submit"><i class="fas fa-search"></i></button>
                        </form>
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


    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center" style="background-color: gray; color: white;">
                        <tr>
                            <th>No</th>
                            <th>Kode KoTA</th>
                            <th>Judul KoTA</th>
                            <th>Tahap Progres</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $nomor = 1; 
                            foreach($kotas as $row):
                        ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td class="text-center"><?= $row->id_kota; ?></td>
                                <td><?= $row->judul;?></td>
                                <td class="text-center">
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
                                </td>
                                <td>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kota.destroy', $row->id_kota) }}" method="POST">
                                        <a class="detail" href="{{ route('kota.detail', $row->id_kota) }}"><i class="nav-icon fas fa-eye" style="color: gray;"></i></a>
                                        <a class="edit" href="{{ route('kota.edit', $row->id_kota) }}"><i class="nav-icon fas fa-pen" style="color: blue;"></i></a>                     
                                        @csrf
                                        @method('DELETE')
                                        <a class="destroy" type="submit" href="{{ route('kota.destroy', $row->id_kota) }}"><i class="nav-icon fas fa-trash"style="color: red;"></i></a>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>

@endsection
