@extends('adminlte.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6 col-md-8">
                  <h1 class="m-0">KoTA</h1>
              </div><!-- /.col -->
              <div class="col-6 col-md-4 d-flex justify-content-end">
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
                                <td><?= $row->judul;?></td>
                                <td><?= $row->tahapan_progres;?></td>
                                <td>
                                    <a class="edit" href="/kota/edit<?= $row->id_kota;?>"><i class="nav-icon fas fa-eye" style="color: gray;"></i></a>
                                    <a class="detail" href="/kota/<?= $row->id_kota;?>"><i class="nav-icon fas fa-pen" style="color: blue;"></i></a>                     
                                    <a class="hapus" href="/kota/delete<?= $row->id_kota;?>"><i class="nav-icon fas fa-trash"style="color: red;"></i></a>
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
