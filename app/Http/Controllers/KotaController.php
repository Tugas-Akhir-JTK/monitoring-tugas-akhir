<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KotaModel;
use Illuminate\Support\Facades\Storage;

class KotaController extends Controller
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
        $kotaModel = new KotaModel();
        $kotas = $kotaModel->getKota();

        return view('kota.index', compact('kotas'));
    }

    public function detail($id)
    {
        $kota = KotaModel::findOrFail($id);

        return view('kota.detail', compact('kota'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        // Lakukan pencarian berdasarkan judul kota
        $kotas = KotaModel::where('id_kota', 'LIKE', "%$keyword%")->get();

        return view('kota.index', compact('kotas'));
    }

    public function create()
    {
        return view('kota.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kota' => 'required',
            'judul' => 'required',
            'nim_satu' => 'required', 
            'nama_mahasiswa_satu' => 'required',
            'nim_dua' => 'required', 
            'nama_mahasiswa_dua' => 'required', 
            'nim_tiga' => 'required', 
            'nama_mahasiswa_tiga' => 'required', 
            'nip_satu' => 'required', 
            'pembimbing_satu' => 'required', 
            'nip_dua' => 'required', 
            'pembimbing_dua' => 'required', 
            'kelas' => 'required', 
            'periode' => 'required', 
            'tahapan_progres' => 'required', 
        ]);

        KotaModel::create($request->all());

        return redirect()->route('kota')->with('success', 'Data Kota berhasil disimpan');
    }

    public function edit($id)
    {
        $kota = KotaModel::findOrFail($id);
        if (!$kota) {
            return redirect()->route('kota')->withErrors('Data tidak ditemukan.');
        }

        return view('kota.edit', compact('kota'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_kota' => 'required',
            'judul' => 'required',
            'nim_satu' => 'required', 
            'nama_mahasiswa_satu' => 'required',
            'nim_dua' => 'required', 
            'nama_mahasiswa_dua' => 'required', 
            'nim_tiga' => 'required', 
            'nama_mahasiswa_tiga' => 'required', 
            'nip_satu' => 'required', 
            'pembimbing_satu' => 'required', 
            'nip_dua' => 'required', 
            'pembimbing_dua' => 'required', 
            'kelas' => 'required', 
            'periode' => 'required', 
            'tahapan_progres' => 'required', 
        ]);

        // Mengambil data kota berdasarkan id
        $kota = KotaModel::findOrFail($id);
        
        // Mengupdate data kota dengan data yang diterima dari request
        $kota->update($request->all());

        // Redirect ke halaman kota.index dengan pesan sukses
        return redirect()->route('kota')->with('success', 'Data Kota berhasil diperbarui');
    }


    public function destroy($id)
    {
        $kota = KotaModel::findOrFail($id);
        Storage::delete('/kota'. $kota->id_kota);
        $kota->delete();

        
        return redirect()->route('kota')->with('success', 'Data Kota berhasil dihapus');
    }
}
