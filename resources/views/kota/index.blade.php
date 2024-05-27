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
    <!-- <div class="toast align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Hello, world! This is a toast message.
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>    -->
    @endif

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
                                <td class="text-center"><?= $nomor++; ?></td>
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
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kota.destroy', $row->id_kota) }}" method="POST">
                                        <a class="detail" href="{{ route('kota.detail', $row->id_kota) }}"><i class="nav-icon fas fa-eye" style="color: gray;"></i></a>
                                        <a class="edit" href="{{ route('kota.edit', $row->id_kota) }}"><i class="nav-icon fas fa-pen" style="color: blue;"></i></a>                     
                                       
                                        <a class="destroy" type="submit" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="nav-icon fas fa-trash"style="color: red;"></i></a>
                                        <!-- href="{{ route('kota.destroy', $row->id_kota) }}" -->
                                    </form>
                                </td>
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('kota.destroy', $row->id_kota) }}" method="DELETE">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Yakin Akan Menghapus KoTA ini ??</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-primary" >Iya</button>
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
        </div>
    </div>
  </div>

@endsection
