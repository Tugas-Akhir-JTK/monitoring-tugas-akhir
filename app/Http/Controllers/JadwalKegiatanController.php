<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalKegiatanModel;



class JadwalKegiatanController extends Controller
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
        $jadwalKegiatan = JadwalKegiatanModel::all();
        return view('kegiatan.index', compact('jadwalKegiatan'));
    }

    public function create()
    {
        return view('kegiatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_label' => 'required',
            'nama_kegiatan' => 'required',
            'bulan' => 'required|integer|min:1|max:12',
            'minggu' => 'required|integer|min:1|max:4',
            'status' => 'required|in:selesai,belum_selesai',
        ]);

        JadwalKegiatanModel::create($request->all());

        // return response()->json(['success' => true]);
        return redirect()->route('kegiatan.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $jadwalKegiatan = JadwalKegiatanModel::findOrFail($id);
        $jadwalKegiatan->update($request->only('status'));
        
        return redirect()->route('kegiatan.index')->with('success', 'Status kegiatan berhasil diubah');
    }
}
