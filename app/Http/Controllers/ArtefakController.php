<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArtefakModel;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $artefaks = ArtefakModel::all();
        foreach ($artefaks as $artefak) {
            $artefak->formatted_tenggat_waktu = Carbon::parse($artefak->tenggat_waktu)->format('l, d F Y H:i');
        }

        return view('artefak.index', compact('artefaks'));
    }

    // public function create()
    // {
    //     return view('artefak.create');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'nama_artefak' => 'required',
            'deskripsi' => 'required',
            'kategori_artefak' => 'required',
            'tanggal_tenggat' => 'required|date',
            'waktu_tenggat' => 'required|date_format:H:i',
        ]);

        $tanggalTenggat = $request->tanggal_tenggat;
        $waktuTenggat = $request->waktu_tenggat;
        $tenggat_waktu = $tanggalTenggat . ' ' . $waktuTenggat . ':00';

        DB::table('tbl_artefak')->insert([
            'nama_artefak' => $request->nama_artefak,
            'deskripsi' => $request->deskripsi,
            'kategori_artefak' => $request->kategori_artefak,
            'tenggat_waktu' => $tenggat_waktu, // Combined datetime value
        ]);

        ArtefakModel::create($request->all());

        return redirect()->route('artefak')
                        ->with('success', 'Artefak berhasil ditambahkan.');
    }

    // public function detail(ArtefakModel $artefak)
    // {
    //     return view('artefak.detail', compact('artefaks'));
    // }

    public function edit($id)
    {
        $artefaks = ArtefakModel::findOrFail($id);
        if (!$artefaks) {
            return redirect()->route('artefak')->withErrors('Data tidak ditemukan.');
        }

        return view('artefak.edit', compact('artefaks'));
    }

    public function update(Request $request, ArtefakModel $artefak)
    {
        $request->validate([
            'nama_artefak' => 'required',
            'deskripsi' => 'required',
            'kategori_artefak' => 'required',
            'tenggat_waktu' => 'required',
        ]);

        $artefak->update($request->all());

        return redirect()->route('artefak')
                         ->with('success', 'Artefak berhasil diupdate.');
    }

    public function destroy($id)
    {
        $artefak = ArtefakModel::findOrFail($id);
        Storage::delete('/artefak'. $artefak->id_artefak);
        $artefak->delete();
        
        return redirect()->route('artefak')->with('success', 'Data Artefak berhasil dihapus');
    }

}
