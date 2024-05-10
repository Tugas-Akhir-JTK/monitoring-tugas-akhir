<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KotaModel;

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

    public function create()
    {
        return view('kota.create');
    }

    public function store(Request $request)
    {
        $request->validate([
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
            // 'jumlah_bimbingan' => 'required', 
            // 'jumlah_artefak' => 'required',
        ]);

        KotaModel::create($request->all());

        return redirect()->route('kota.index')->with('success', 'Data Kota berhasil disimpan');
    }

    public function edit($id)
    {
        $kota = KotaModel::findOrFail($id);

        return view('kota.edit', compact('kota'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
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
            // 'jumlah_bimbingan' => 'required', 
            // 'jumlah_artefak' => 'required',
        ]);

        $kota = KotaModel::findOrFail($id);
        $kota->update($request->all());

        return redirect()->route('kota.index')->with('success', 'Data Kota berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kota = KotaModel::findOrFail($id);
        $kota->delete();

        return redirect()->route('kota.index')->with('success', 'Data Kota berhasil dihapus');
    }
}
