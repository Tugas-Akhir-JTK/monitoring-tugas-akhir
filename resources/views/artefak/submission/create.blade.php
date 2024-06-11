@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Kumpulkan Tugas: {{ $artefak->nama_artefak }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('submissions.store', $artefak->id_artefak) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="file_pengumpulan">Upload Tugas (doc, docx, pdf, xlsx)</label>
                    <input type="file" class="form-control" id="file_pengumpulan" name="file_pengumpulan" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Kumpulkan</button>
            </form>
        </div>
    </div>
</div>
@endsection
