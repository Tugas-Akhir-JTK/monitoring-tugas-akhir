<?php

namespace App\Http\Controllers;

use App\Models\ArtefakModel;
use App\Models\PeriodeModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArtefakController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // belum ditambah by periode

        $user = auth()->user();
        $artefaks = ArtefakModel::where('periode_id', 3)->get();

        foreach($artefaks as $artefak) {
            $artefak->tenggat_waktu = Carbon::parse($artefak->tenggat_waktu)->locale('id')->translatedFormat('l, d F Y - H:i');
        }

        return view('artefak.index', ['artefaks' => $artefaks]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_artefak' => 'required',
            'deskripsi_artefak' => 'required',
            'kategori_artefak' => 'required',
            'tanggal_tenggat' => 'required|date',
            'waktu_tenggat' => 'required|date_format:H:i',
        ]);

        $nama_artefak = $request->input('nama_artefak');
        $deskripsi_artefak = $request->input('deskripsi_artefak');
        $kategori_artefak = $request->input('kategori_artefak');
        $tanggal_tenggat = $request->input('tanggal_tenggat');
        $waktu_tenggat = $request->input('waktu_tenggat');
        $tenggat_waktu = $tanggal_tenggat . ' ' . $waktu_tenggat . ':00'; 

        // cek duplikasi
        $existingArtefak = ArtefakModel::where('nama_artefak', $request->nama_artefak)->exists();
        if($existingArtefak) {
            session()->flash('error', 'Gagal menambahkan data. Nama artefak sudah terdaftar di dalam sistem.');
            return redirect()->back()->withInput();
        }

        // cek periode
        $tahun_sekarang = Carbon::now()->year;
        $tahun_sekarang = (string) $tahun_sekarang;
        $tahun = PeriodeModel::where('periode', $tahun_sekarang)->first();

        if ($tahun !== null) {
            $periode_id = $tahun->id;
        } else {
            $periode_id = 3; // di db periode_id 3 adalah 2025
        }

        try {
            ArtefakModel::create([
                'periode_id' => $periode_id,
                'nama_artefak' => $nama_artefak,
                'deskripsi_artefak' => $deskripsi_artefak,
                'kategori_artefak' => $kategori_artefak,
                'tenggat_waktu' => $tenggat_waktu
            ]);
            session()->flash('success', 'Artefak '. $nama_artefak .' berhasil ditambahkan.');
        } catch (\Throwable $th) {
            session()->flash('error', 'Gagal menambah Artefak. Silakan coba lagi.');
        }

        return redirect()->route('artefak');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_artefak' => 'required',
            'deskripsi_artefak' => 'required',
            'kategori_artefak' => 'required',
            'tenggat_waktu' => 'required',
        ]);

        // cek duplikasi
        $existingArtefak = ArtefakModel::where('nama_artefak', $request->nama_artefak)
                                        ->where('id', '!=',  $id)
                                        ->first();
        if($existingArtefak !== null) {
            session()->flash('error', 'Gagal mengupdate data. Nama artefak sudah terdaftar di dalam sistem.');
            return redirect()->back();
        }

        $artefak = ArtefakModel::findOrFail($id);

        try {
            $artefak->update($request->all());

            session()->flash('success', 'Artefak '. $request->nama_artefak .' berhasil diupdate');
        } catch (\Throwable $th) {
            session()->flash('error', 'Gagal menambah Artefak. Silakan coba lagi.');
        }

        return redirect()->route('artefak');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $artefak = ArtefakModel::findOrFail($id);
            $artefak->delete();

            session()->flash('success', 'Data Artefak berhasil dihapus');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menghapus Artefak. Silakan coba lagi.');
        }

        return redirect()->route('artefak');
    }
 
}
