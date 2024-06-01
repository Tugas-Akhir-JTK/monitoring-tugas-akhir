@extends('adminlte.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Resume Bimbingan</h1>
            </div><!-- /.col -->
            <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('resume.create') }} ">
                    <button type="button" class="btn btn-success">
                        Tambah
                        <i class="nav-icon fas fa-plus"></i>
                    </button>
                </a>
            </div><!-- /.col -->
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
                    <div class="row mt-4">
                        @foreach($resumes as $resume)
                        <div class="col-md-4">
                            <div class="card">
                                <h5 class="card-header d-flex justify-content-between align-items-center">
                                    <div class="col">Resume Bimbingan Ke-{{ $resume->id_resume_bimbingan }}</div>
                                    <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
                                        <!-- <a href="{{ route('resume.detail', $resume->id_resume_bimbingan) }}">
                                            <i class="nav-icon fas fa-eye" style="color: gray;"></i>
                                        </a> -->
                                        <a href="{{ route('resume.edit', $resume->id_resume_bimbingan) }}">
                                            <i class="nav-icon fas fa-pen" style="color: blue;"></i>
                                        </a>
                                        <!-- <form action="{{ route('resume.destroy', $resume->id_resume_bimbingan) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link" style="color: red; padding: 0; border: none;">
                                                <i class="nav-icon fas fa-trash"></i>
                                            </button>
                                        </form> -->
                                    </div>
                                </h5>
                                <div class="card-body">
                                    <div class="row justify-content-start">
                                        <small class="col-4 card-text">{{ $resume->tanggal_bimbingan }}</small>
                                        <p class="col-4 card-text"><small class="text-muted">{{ $resume->waktu_bimbingan }}</small></p>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            @php
                                                // Tentukan jumlah karakter maksimal sebelum "Read More"
                                                $maxLength = 100;
                                                // Ambil teks isi resume bimbingan
                                                $content = $resume->isi_resume_bimbingan;
                                                // Potong teks jika lebih panjang dari jumlah karakter maksimal
                                                $shortContent = strlen($content) > $maxLength ? substr($content, 0, $maxLength) . '...' : $content;
                                            @endphp
                                            <h5>Resume</h5>
                                            <small>
                                                {{ $shortContent }}
                                                @if(strlen($content) > $maxLength)
                                                    <a href="{{ route('resume.detail', ['id' => $resume->id_resume_bimbingan]) }}">Read More</a>
                                                @endif
                                            </small>
                                        </div>
                                        <div class="col">
                                            <h5>Revisi</h5>

                                            <small>
                                                {{ $shortContent }}
                                                @if(strlen($content) > $maxLength)
                                                    <a href="{{ route('resume.detail', ['id' => $resume->id_resume_bimbingan]) }}">Read More</a>
                                                @endif
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    


@endsection
