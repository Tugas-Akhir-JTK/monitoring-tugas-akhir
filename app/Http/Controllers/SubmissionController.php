<?php

namespace App\Http\Controllers;
use App\Models\ArtefakModel;
use App\Models\KotaHasArterfakModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function create($artefak_id)
    {
        $artefak = ArtefakModel::findOrFail($artefak_id);
        return view('submissions.create', compact('artefak'));
    }

    public function store(Request $request, $artefak_id)
    {
        $request->validate([
            'file_pengumpulan' => 'required|mimes:doc,docx,pdf,xlsx|max:2048',
        ]);

        $file = $request->file('file_pengumpulan');
        $filePath = $file->store('submissions', 'public');
        
        KotaHasArterfakModel::create([
            'id_kota_user' => auth()->user()->id,
            'id_artefak' => $artefak_id,
            'file_pengumpulan' => $filePath,
            'waktu_pengumpulan' => now(),
        ]);
        
        

        return redirect()->route('artefak')->with('success', 'Tugas berhasil dikumpulkan!');
    }
}
